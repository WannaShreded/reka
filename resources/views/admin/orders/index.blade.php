<x-admin-layout title="Orders">

    {{-- Header --}}
    <div class="mb-6">
        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#1d4f72] mb-1">Management</p>
        <h1 class="text-2xl font-semibold tracking-tight text-[#181818]">Orders</h1>
    </div>

    {{-- Filters --}}
    <form method="GET" action="{{ route('admin.orders.index') }}"
          class="mb-5 flex flex-col sm:flex-row gap-3 p-4 rounded-[20px] border border-[#e7e2d8] bg-white shadow-sm">
        <div class="relative flex-1">
            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-[#9ca3af]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search order #, customer, email…"
                   class="w-full pl-10 pr-4 py-2.5 text-sm border border-[#e7e2d8] rounded-full bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] focus:ring-1 focus:ring-[#1d4f72] transition-all placeholder:text-[#9ca3af]">
        </div>
        <select name="status"
                class="px-4 py-2.5 text-sm border border-[#e7e2d8] rounded-full bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] transition-all text-[#4b5563]">
            <option value="">All Statuses</option>
            @foreach(['pending','pending_payment','processing','shipped','completed','cancelled','expired','failed','payment_failed'] as $s)
            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucwords(str_replace('_',' ',$s)) }}</option>
            @endforeach
        </select>
        <button type="submit"
                class="px-5 py-2.5 text-sm font-semibold rounded-full bg-[#1d4f72] text-white hover:bg-[#153b54] transition-colors">Filter</button>
        @if(request()->hasAny(['search','status']))
            <a href="{{ route('admin.orders.index') }}"
               class="px-5 py-2.5 text-sm font-medium rounded-full border border-[#e7e2d8] text-[#4b5563] hover:bg-[#f7f5ef] transition-colors">Clear</a>
        @endif
    </form>

    {{-- Table --}}
    <div class="rounded-[28px] border border-[#e7e2d8] bg-white shadow-[0_12px_35px_rgba(17,17,17,0.05)] overflow-hidden">
        @if($orders->isEmpty())
        <div class="py-20 text-center">
            <svg class="mx-auto w-10 h-10 text-[#d1d5db] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            <p class="text-sm text-[#9ca3af]">No orders found.</p>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[#f7f6f2] border-b border-[#f0ece3]">
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Order</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Customer</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Items</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Total</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Payment</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Status</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">Date</th>
                        <th class="px-6 py-3.5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#f0ece3]">
                    @foreach($orders as $order)
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
                        $payColors = ['paid' => 'text-emerald-600 font-medium', 'pending' => 'text-amber-600', 'failed' => 'text-red-500'];
                    @endphp
                    <tr class="hover:bg-[#fafaf8] transition-colors">
                        <td class="px-6 py-4 font-semibold text-[#181818] whitespace-nowrap">{{ $order->order_number }}</td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-[#181818]">{{ $order->customer_name }}</div>
                            <div class="text-xs text-[#9ca3af]">{{ $order->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-[#4b5563]">
                            {{ $order->orderItems->count() }} item(s)
                        </td>
                        <td class="px-6 py-4 font-medium text-[#181818] whitespace-nowrap">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs {{ $payColors[$order->payment_status] ?? 'text-[#6b7280]' }}">
                                {{ ucfirst($order->payment_status ?? '—') }}
                            </div>
                            @if($order->payment_method)
                            <div class="text-xs text-[#9ca3af]">{{ ucwords(str_replace('_',' ',$order->payment_method)) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold border {{ $statusColors[$order->status] ?? 'bg-gray-50 text-gray-500 border-gray-200' }}">
                                {{ ucwords(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-[#9ca3af] whitespace-nowrap">
                            {{ $order->created_at->format('d M Y') }}<br>
                            <span class="text-[#d1d5db]">{{ $order->created_at->format('H:i') }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.orders.show', $order) }}"
                               class="text-xs font-semibold text-[#1d4f72] hover:text-[#153b54] whitespace-nowrap">View →</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
        <div class="px-6 py-4 border-t border-[#f0ece3] bg-[#f7f6f2]">
            {{ $orders->links() }}
        </div>
        @endif
        @endif
    </div>

    @if($orders->total() > 0)
    <p class="mt-3 text-xs text-[#9ca3af] text-right">
        Showing {{ $orders->firstItem() }}–{{ $orders->lastItem() }} of {{ $orders->total() }} orders
    </p>
    @endif

</x-admin-layout>
