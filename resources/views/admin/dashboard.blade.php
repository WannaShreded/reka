<x-admin-layout title="Dashboard">

    {{-- Page Header --}}
    <div class="mb-8">
        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#1d4f72] mb-1">Store Overview</p>
        <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight text-[#181818]">Dashboard</h1>
        <p class="mt-1 text-sm text-[#6b7280]">{{ now()->format('l, d F Y') }}</p>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        @php
            $statCards = [
                ['label' => 'Total Products',    'value' => $stats['total_products'],     'color' => '#1d4f72', 'bg' => '#eef6fb', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                ['label' => 'Available',         'value' => $stats['available_products'],  'color' => '#2f7d5f', 'bg' => '#ecfdf5', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Sold',              'value' => $stats['sold_products'],       'color' => '#b5474f', 'bg' => '#fef2f2', 'icon' => 'M5 13l4 4L19 7'],
                ['label' => 'Total Orders',      'value' => $stats['total_orders'],        'color' => '#6d4ed6', 'bg' => '#f5f3ff', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ['label' => 'Pending / Active',  'value' => $stats['pending_orders'],      'color' => '#b45309', 'bg' => '#fffbeb', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Completed',         'value' => $stats['completed_orders'],    'color' => '#2f7d5f', 'bg' => '#ecfdf5', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
            ];
        @endphp

        @foreach($statCards as $card)
        <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-5 shadow-[0_10px_30px_rgba(17,17,17,0.05)] hover:shadow-[0_14px_36px_rgba(17,17,17,0.08)] transition-shadow duration-200">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-medium text-[#6b7280] uppercase tracking-wider">{{ $card['label'] }}</p>
                    <p class="mt-2 text-3xl font-bold text-[#181818]">{{ $card['value'] }}</p>
                </div>
                <div class="w-10 h-10 rounded-2xl flex items-center justify-center flex-shrink-0" style="background:{{ $card['bg'] }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:{{ $card['color'] }}">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/>
                    </svg>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Recent Orders --}}
    <div class="rounded-[28px] border border-[#e7e2d8] bg-white shadow-[0_12px_35px_rgba(17,17,17,0.05)] overflow-hidden">
        <div class="px-6 py-5 border-b border-[#f0ece3] flex items-center justify-between">
            <h2 class="text-base font-semibold text-[#181818]">Recent Orders</h2>
            <a href="{{ route('admin.orders.index') }}" class="text-xs font-semibold text-[#1d4f72] hover:text-[#153b54] transition-colors uppercase tracking-wider">View all →</a>
        </div>

        @if($recentOrders->isEmpty())
        <div class="px-6 py-12 text-center text-sm text-[#9ca3af]">
            No orders yet.
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[#f7f6f2]">
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Payment</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Date</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#f0ece3]">
                    @foreach($recentOrders as $order)
                    @php
                        $statusColors = [
                            'pending'         => 'bg-amber-50 text-amber-700 border-amber-200',
                            'pending_payment' => 'bg-amber-50 text-amber-700 border-amber-200',
                            'processing'      => 'bg-blue-50 text-blue-700 border-blue-200',
                            'shipped'         => 'bg-sky-50 text-sky-700 border-sky-200',
                            'completed'       => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                            'cancelled'       => 'bg-red-50 text-red-600 border-red-200',
                            'expired'         => 'bg-gray-50 text-gray-500 border-gray-200',
                            'failed'          => 'bg-red-50 text-red-600 border-red-200',
                            'payment_failed'  => 'bg-red-50 text-red-600 border-red-200',
                        ];
                        $payColors = [
                            'paid'    => 'text-emerald-600',
                            'pending' => 'text-amber-600',
                            'failed'  => 'text-red-600',
                        ];
                    @endphp
                    <tr class="hover:bg-[#fafaf8] transition-colors">
                        <td class="px-6 py-4 font-semibold text-[#181818]">{{ $order->order_number }}</td>
                        <td class="px-6 py-4 text-[#4b5563]">
                            <div>{{ $order->customer_name }}</div>
                            <div class="text-xs text-[#9ca3af]">{{ $order->email }}</div>
                        </td>
                        <td class="px-6 py-4 font-medium text-[#181818]">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="text-xs {{ $payColors[$order->payment_status] ?? 'text-[#6b7280]' }}">
                                {{ ucfirst($order->payment_status ?? '-') }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold border {{ $statusColors[$order->status] ?? 'bg-gray-50 text-gray-500 border-gray-200' }}">
                                {{ ucwords(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-[#9ca3af]">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-xs font-medium text-[#1d4f72] hover:text-[#153b54]">View →</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    {{-- Quick Links --}}
    <div class="mt-6 grid grid-cols-2 gap-4">
        <a href="{{ route('admin.products.create') }}"
           class="flex items-center gap-3 px-5 py-4 rounded-[20px] border border-[#e7e2d8] bg-white hover:border-[#1d4f72] hover:shadow-[0_8px_24px_rgba(29,79,114,0.10)] transition-all duration-200 group">
            <span class="w-10 h-10 bg-[#eef6fb] rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-[#1d4f72] transition-colors">
                <svg class="w-5 h-5 text-[#1d4f72] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </span>
            <div>
                <p class="text-sm font-semibold text-[#181818]">Add Product</p>
                <p class="text-xs text-[#9ca3af]">List a new item</p>
            </div>
        </a>
        <a href="{{ route('admin.orders.index') }}"
           class="flex items-center gap-3 px-5 py-4 rounded-[20px] border border-[#e7e2d8] bg-white hover:border-[#1d4f72] hover:shadow-[0_8px_24px_rgba(29,79,114,0.10)] transition-all duration-200 group">
            <span class="w-10 h-10 bg-[#f5f3ff] rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-[#6d4ed6] transition-colors">
                <svg class="w-5 h-5 text-[#6d4ed6] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </span>
            <div>
                <p class="text-sm font-semibold text-[#181818]">Manage Orders</p>
                <p class="text-xs text-[#9ca3af]">View & update statuses</p>
            </div>
        </a>
    </div>

</x-admin-layout>
