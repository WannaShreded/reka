<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MidtransService
{
    public function createSnapTransaction(Order $order): array
    {
        $serverKey = $this->serverKey();

        $response = Http::withBasicAuth($serverKey, '')
            ->acceptJson()
            ->asJson()
            ->post($this->snapUrl().'/snap/v1/transactions', $this->snapPayload($order));

        if ($response->failed()) {
            throw new RequestException($response);
        }

        return $response->json();
    }

    public function validSignature(array $payload): bool
    {
        $expected = hash('sha512', implode('', [
            $payload['order_id'] ?? '',
            $payload['status_code'] ?? '',
            $payload['gross_amount'] ?? '',
            $this->serverKey(),
        ]));

        return hash_equals($expected, (string) ($payload['signature_key'] ?? ''));
    }

    public function applyNotification(Order $order, array $payload): Order
    {
        $transactionStatus = (string) ($payload['transaction_status'] ?? '');
        $fraudStatus = (string) ($payload['fraud_status'] ?? '');

        [$paymentStatus, $orderStatus] = $this->mapStatuses($transactionStatus, $fraudStatus);

        return $this->applyOrderStatus($order, $paymentStatus, $orderStatus, [
            'midtrans_transaction_id' => $payload['transaction_id'] ?? $order->midtrans_transaction_id,
            'midtrans_order_id' => $payload['order_id'] ?? $order->midtrans_order_id,
            'midtrans_payment_type' => $payload['payment_type'] ?? $order->midtrans_payment_type,
            'midtrans_fraud_status' => $fraudStatus ?: $order->midtrans_fraud_status,
        ]);
    }

    public function applyOrderStatus(Order $order, string $paymentStatus, string $orderStatus, array $extraUpdates = []): Order
    {
        return DB::transaction(function () use ($order, $paymentStatus, $orderStatus, $extraUpdates): Order {
            $order->refresh();

            $updates = array_merge([
                'payment_status' => $paymentStatus,
                'status' => $orderStatus,
            ], $extraUpdates);

            if ($paymentStatus === 'paid' && blank($order->paid_at)) {
                $updates['paid_at'] = now();
            }

            if ($paymentStatus === 'expired' && blank($order->payment_expired_at)) {
                $updates['payment_expired_at'] = now();
            }

            $this->syncProductStatus($order, $paymentStatus);

            $order->update($updates);

            return $order->refresh();
        });
    }

    private function syncProductStatus(Order $order, string $paymentStatus): void
    {
        if (! in_array($paymentStatus, ['failed', 'expired', 'paid'], true)) {
            return;
        }

        $order->loadMissing('orderItems');

        $isTerminal = in_array($order->status, ['payment_failed', 'expired', 'paid'], true);
        if ($isTerminal) {
            return;
        }

        foreach ($order->orderItems as $item) {
            $product = Product::whereKey($item->product_id)->lockForUpdate()->first();
            if (! $product) {
                continue;
            }

            if (in_array($paymentStatus, ['failed', 'expired'], true)) {
                if ($product->status === 'reserved' || $product->status === 'sold') {
                    $product->update([
                        'status' => 'available',
                        'stock' => 1,
                    ]);
                }
            } elseif ($paymentStatus === 'paid') {
                $product->decrement('stock', $item->quantity);
                $product->update(['status' => 'sold']);
            }
        }
    }

    private function snapPayload(Order $order): array
    {
        $order->loadMissing('orderItems');

        $itemDetails = $order->orderItems->map(fn ($item): array => [
            'id' => $item->product_slug,
            'price' => (int) $item->unit_price,
            'quantity' => (int) $item->quantity,
            'name' => $item->product_name,
        ])->values()->all();

        if ((int) $order->shipping_cost > 0) {
            $itemDetails[] = [
                'id' => 'shipping',
                'price' => (int) $order->shipping_cost,
                'quantity' => 1,
                'name' => 'Shipping',
            ];
        }

        return [
            'transaction_details' => [
                'order_id' => $order->order_number,
                'gross_amount' => (int) $order->total,
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'email' => $order->email,
                'phone' => $order->phone,
                'shipping_address' => [
                    'first_name' => $order->customer_name,
                    'phone' => $order->phone,
                    'address' => $order->address,
                ],
            ],
            'item_details' => $itemDetails,
            'callbacks' => [
                'finish' => route('payments.midtrans.finish', ['order' => $order->id]),
                'unfinish' => route('payments.midtrans.unfinish', ['order' => $order->id]),
                'error' => route('payments.midtrans.error', ['order' => $order->id]),
            ],
        ];
    }

    private function mapStatuses(string $transactionStatus, string $fraudStatus): array
    {
        return match ($transactionStatus) {
            'capture' => $fraudStatus === 'challenge'
                ? ['pending', 'pending_payment']
                : ['paid', 'processing'],
            'settlement' => ['paid', 'processing'],
            'pending' => ['pending', 'pending_payment'],
            'deny', 'cancel', 'failure' => ['failed', 'payment_failed'],
            'expire' => ['expired', 'expired'],
            default => ['pending', 'pending_payment'],
        };
    }

    private function snapUrl(): string
    {
        return rtrim((string) config('services.midtrans.snap_url'), '/');
    }

    private function serverKey(): string
    {
        return (string) config('services.midtrans.server_key');
    }
}
