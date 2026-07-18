<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Order Confirmed</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-shell min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <div class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="rounded-[32px] border border-reka-border bg-white p-8 shadow-[0_20px_60px_rgba(17,17,17,0.08)]">
            <div class="mb-8 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Order confirmed</p>
                    <h1 class="mt-2 text-3xl font-semibold tracking-tight">Thank you for your purchase</h1>
                    <p class="mt-2 text-sm text-reka-text-muted">Your order {{ $order->order_number }} is now being prepared.</p>
                </div>
                <a href="{{ route('orders') }}" class="rounded-full bg-reka-blue px-4 py-3 text-sm font-semibold text-white transition hover:bg-reka-blue-dark">View order history</a>
            </div>

            @error('payment')
                <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">{{ $message }}</div>
            @enderror

            <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="rounded-[24px] border border-reka-border bg-reka-surface p-6">
                    <h2 class="text-xl font-semibold">Order details</h2>
                    <div class="mt-4 space-y-3 text-sm text-reka-text-secondary">
                        <div class="flex items-center justify-between"><span>Order number</span><span class="font-semibold text-reka-text">{{ $order->order_number }}</span></div>
                        <div class="flex items-center justify-between"><span>Order status</span><span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">{{ ucfirst(str_replace('_', ' ', $order->status)) }}</span></div>
                        <div class="flex items-center justify-between"><span>Payment status</span><span class="rounded-full bg-reka-blue-light px-3 py-1 text-xs font-semibold text-reka-blue">{{ ucfirst($order->payment_status) }}</span></div>
                        @if($order->midtrans_transaction_id)
                            <div class="flex items-center justify-between"><span>Transaction ID</span><span class="font-semibold text-reka-text">{{ $order->midtrans_transaction_id }}</span></div>
                        @endif
                        <div class="flex items-center justify-between"><span>Shipping method</span><span class="font-semibold text-reka-text">{{ ucfirst($order->shipping_method) }}</span></div>
                        <div class="flex items-center justify-between"><span>Payment method</span><span class="font-semibold text-reka-text">{{ ucfirst($order->payment_method) }}</span></div>
                    </div>
                </div>
                <div class="rounded-[24px] border border-reka-border bg-white p-6">
                    <h2 class="text-xl font-semibold">Summary</h2>
                    <div class="mt-4 space-y-3 text-sm text-reka-text-secondary">
                        <div class="flex items-center justify-between"><span>Subtotal</span><span class="font-semibold text-reka-text">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span></div>
                        <div class="flex items-center justify-between"><span>Shipping</span><span class="font-semibold text-reka-text">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span></div>
                        <div class="flex items-center justify-between border-t border-reka-border pt-3 text-base font-semibold text-reka-text"><span>Total</span><span>Rp {{ number_format($order->total, 0, ',', '.') }}</span></div>
                    </div>
                </div>
            </div>

            <div class="mt-6 rounded-[24px] border border-reka-border bg-white p-6">
                <h2 class="text-xl font-semibold">Ordered items</h2>
                <div class="mt-4 space-y-3">
                    @forelse($order->orderItems as $item)
                        <div class="flex items-center justify-between gap-4 rounded-2xl bg-reka-surface px-4 py-3 text-sm">
                            <div>
                                <p class="font-semibold text-reka-text">{{ $item->product_name }}</p>
                                <p class="text-reka-text-muted">{{ $item->size ?? 'Standard' }}{{ $item->color ? ' · ' . $item->color : '' }} × {{ $item->quantity }}</p>
                            </div>
                            <p class="font-semibold text-reka-text">Rp {{ number_format($item->line_total, 0, ',', '.') }}</p>
                        </div>
                    @empty
                        @foreach($order->items ?? [] as $item)
                            <div class="flex items-center justify-between gap-4 rounded-2xl bg-reka-surface px-4 py-3 text-sm">
                                <div>
                                    <p class="font-semibold text-reka-text">{{ $item['name'] ?? 'Product' }}</p>
                                    <p class="text-reka-text-muted">{{ $item['size'] ?? 'Standard' }}{{ !empty($item['color']) ? ' · ' . $item['color'] : '' }} × {{ $item['quantity'] ?? 1 }}</p>
                                </div>
                                <p class="font-semibold text-reka-text">Rp {{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 0, ',', '.') }}</p>
                            </div>
                        @endforeach
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</body>
</html>
