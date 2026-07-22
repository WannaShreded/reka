<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\MidtransService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentFailureProductStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_released_on_payment_failure(): void
    {
        $product = Product::create([
            'slug' => 'test-product',
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 1000,
            'status' => 'reserved',
            'stock' => 1,
            'image' => 'test.jpg',
            'images' => ['test.jpg'],
            'sizes' => ['S'],
        ]);

        $order = Order::create([
            'user_id' => \App\Models\User::factory()->create()->id,
            'order_number' => 'TEST-123',
            'status' => 'pending_payment',
            'payment_status' => 'pending',
            'customer_name' => 'Test',
            'email' => 'test@test.com',
            'address' => 'Test',
            'shipping_method' => 'standard',
            'payment_method' => 'credit_card',
            'items' => [],
            'subtotal' => 1000,
            'shipping_cost' => 0,
            'total' => 1000,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'product_slug' => $product->slug,
            'product_name' => $product->name,
            'quantity' => 1,
            'unit_price' => 1000,
            'line_total' => 1000,
        ]);

        $service = app(MidtransService::class);
        $service->applyOrderStatus($order, 'failed', 'payment_failed');

        $product->refresh();
        $this->assertEquals('available', $product->status);
        $this->assertEquals(1, $product->stock);
    }

    public function test_product_released_on_payment_expire(): void
    {
        $product = Product::create([
            'slug' => 'test-product-2',
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 1000,
            'status' => 'reserved',
            'stock' => 1,
            'image' => 'test.jpg',
            'images' => ['test.jpg'],
            'sizes' => ['S'],
        ]);

        $order = Order::create([
            'user_id' => \App\Models\User::factory()->create()->id,
            'order_number' => 'TEST-124',
            'status' => 'pending_payment',
            'payment_status' => 'pending',
            'customer_name' => 'Test',
            'email' => 'test@test.com',
            'address' => 'Test',
            'shipping_method' => 'standard',
            'payment_method' => 'credit_card',
            'items' => [],
            'subtotal' => 1000,
            'shipping_cost' => 0,
            'total' => 1000,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'product_slug' => $product->slug,
            'product_name' => $product->name,
            'quantity' => 1,
            'unit_price' => 1000,
            'line_total' => 1000,
        ]);

        $service = app(MidtransService::class);
        $service->applyOrderStatus($order, 'expired', 'expired');

        $product->refresh();
        $this->assertEquals('available', $product->status);
        $this->assertEquals(1, $product->stock);
    }
}
