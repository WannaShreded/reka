<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MidtransPaymentTest extends TestCase
{
    use RefreshDatabase;

    public function test_midtrans_webhook_updates_payment_to_success(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test']);
        $order = $this->createOrder();

        $payload = $this->signedPayload($order, [
            'transaction_status' => 'settlement',
            'transaction_id' => 'midtrans-transaction-1',
            'payment_type' => 'bank_transfer',
        ]);

        $this->postJson(route('payments.midtrans.webhook'), $payload)->assertOk();

        $order->refresh();
        $this->assertSame('paid', $order->payment_status);
        $this->assertSame('paid', $order->status);
        $this->assertSame('midtrans-transaction-1', $order->midtrans_transaction_id);
        $this->assertNotNull($order->paid_at);
    }

    public function test_midtrans_webhook_updates_payment_to_pending(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test']);
        $order = $this->createOrder();

        $this->postJson(route('payments.midtrans.webhook'), $this->signedPayload($order, [
            'transaction_status' => 'pending',
        ]))->assertOk();

        $order->refresh();
        $this->assertSame('pending', $order->payment_status);
        $this->assertSame('pending_payment', $order->status);
    }

    public function test_midtrans_webhook_updates_payment_to_failed(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test']);
        $order = $this->createOrder();

        $this->postJson(route('payments.midtrans.webhook'), $this->signedPayload($order, [
            'transaction_status' => 'deny',
        ]))->assertOk();

        $order->refresh();
        $this->assertSame('failed', $order->payment_status);
        $this->assertSame('payment_failed', $order->status);
    }

    public function test_midtrans_webhook_updates_payment_to_expired(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test']);
        $order = $this->createOrder();

        $this->postJson(route('payments.midtrans.webhook'), $this->signedPayload($order, [
            'transaction_status' => 'expire',
        ]))->assertOk();

        $order->refresh();
        $this->assertSame('expired', $order->payment_status);
        $this->assertSame('expired', $order->status);
        $this->assertNotNull($order->payment_expired_at);
    }

    public function test_expired_payment_callbacks_restore_stock_once(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test']);

        $product = Product::create([
            'slug' => 'linen-blouse',
            'name' => 'Linen Blouse',
            'price' => 350000,
            'image' => 'products/Linen Blouse.jpg',
            'images' => ['products/Linen Blouse.jpg'],
            'sizes' => ['M'],
            'colors' => ['Sand'],
            'stock' => 1,
            'rating' => 4.8,
            'description' => 'A pre-loved linen blouse.',
            'badge' => 'Pre-loved',
            'category' => 'Atasan',
        ]);

        $order = $this->createOrder();
        $order->orderItems()->create([
            'product_id' => $product->id,
            'product_slug' => $product->slug,
            'product_name' => $product->name,
            'size' => 'M',
            'color' => 'Sand',
            'quantity' => 1,
            'unit_price' => 350000,
            'line_total' => 350000,
            'image' => $product->image,
        ]);

        $product->decrement('stock');

        $this->postJson(route('payments.midtrans.webhook'), $this->signedPayload($order, [
            'transaction_status' => 'expire',
        ]))->assertOk();

        $this->postJson(route('payments.midtrans.webhook'), $this->signedPayload($order, [
            'transaction_status' => 'expire',
        ]))->assertOk();

        $product->refresh();
        $this->assertSame(1, $product->stock);
    }

    public function test_midtrans_webhook_rejects_invalid_signature(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test']);
        $order = $this->createOrder();

        $payload = $this->signedPayload($order, [
            'transaction_status' => 'settlement',
            'signature_key' => 'invalid',
        ]);

        $this->postJson(route('payments.midtrans.webhook'), $payload)->assertForbidden();
        $this->assertSame('pending', $order->refresh()->payment_status);
    }

    private function createOrder(): Order
    {
        return Order::create([
            'user_id' => User::factory()->create(['role' => 'customer'])->id,
            'order_number' => 'RKA-20260718-0001',
            'status' => 'pending_payment',
            'payment_status' => 'pending',
            'customer_name' => 'Ayu Customer',
            'email' => 'ayu@example.com',
            'phone' => '+62 812 0000 0000',
            'address' => 'Jl. Sudirman No. 12',
            'shipping_method' => 'standard',
            'payment_method' => 'bank_transfer',
            'items' => [],
            'subtotal' => 100000,
            'shipping_cost' => 0,
            'total' => 100000,
        ]);
    }

    private function signedPayload(Order $order, array $overrides = []): array
    {
        $payload = array_merge([
            'order_id' => $order->order_number,
            'status_code' => '200',
            'gross_amount' => '100000.00',
            'transaction_status' => 'pending',
            'transaction_id' => 'midtrans-transaction-test',
            'payment_type' => 'bank_transfer',
            'fraud_status' => 'accept',
        ], $overrides);

        $payload['signature_key'] = $payload['signature_key'] ?? hash('sha512', $payload['order_id'] . $payload['status_code'] . $payload['gross_amount'] . config('services.midtrans.server_key'));

        return $payload;
    }
}
