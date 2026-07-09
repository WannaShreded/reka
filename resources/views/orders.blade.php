<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Order History</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <div class="min-h-screen bg-[linear-gradient(135deg,_#ffffff_0%,_#f7f6f2_100%)]">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
            <div class="mb-8 flex flex-col gap-4 rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_12px_35px_rgba(17,17,17,0.06)] sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Your orders</p>
                    <h1 class="mt-2 text-3xl font-semibold tracking-tight">Order History</h1>
                </div>
                <div class="rounded-2xl bg-reka-surface px-4 py-3 text-sm text-reka-text-secondary">
                    <p class="font-semibold text-reka-text">{{ count($orders) }} order{{ count($orders) === 1 ? '' : 's' }}</p>
                    <p>Tracked in one place</p>
                </div>
            </div>

            <div class="mb-6 flex flex-col gap-3 rounded-[24px] border border-reka-border bg-white p-4 shadow-[0_10px_30px_rgba(17,17,17,0.05)] sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-semibold">Filter by status</h2>
                    <p class="text-sm text-reka-text-muted">Quickly find the orders you need.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button class="rounded-full bg-reka-blue px-3 py-2 text-sm font-semibold text-white">All</button>
                    <button class="rounded-full border border-reka-border px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">Pending</button>
                    <button class="rounded-full border border-reka-border px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">Paid</button>
                    <button class="rounded-full border border-reka-border px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">Shipped</button>
                    <button class="rounded-full border border-reka-border px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">Delivered</button>
                    <button class="rounded-full border border-reka-border px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">Cancelled</button>
                </div>
            </div>

            <div class="overflow-hidden rounded-[28px] border border-reka-border bg-white shadow-[0_12px_35px_rgba(17,17,17,0.06)]">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead class="bg-reka-surface text-reka-text-secondary">
                            <tr>
                                <th class="px-5 py-4 font-semibold">Order ID</th>
                                <th class="px-5 py-4 font-semibold">Date</th>
                                <th class="px-5 py-4 font-semibold">Status</th>
                                <th class="px-5 py-4 font-semibold">Total Price</th>
                                <th class="px-5 py-4 font-semibold">View Details</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-reka-border">
                            @forelse($orders as $order)
                                <tr class="hover:bg-reka-surface/70">
                                    <td class="px-5 py-4 font-semibold text-reka-text">{{ $order->order_number }}</td>
                                    <td class="px-5 py-4 text-reka-text-secondary">{{ $order->created_at->format('d M Y') }}</td>
                                    <td class="px-5 py-4"><span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">{{ ucfirst($order->status) }}</span></td>
                                    <td class="px-5 py-4 font-semibold">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                    <td class="px-5 py-4"><a href="{{ route('order-confirmation', ['order' => $order->id]) }}" class="font-medium text-reka-blue transition hover:text-reka-blue-dark">View</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-5 py-8 text-center text-reka-text-muted">You have not placed any orders yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
