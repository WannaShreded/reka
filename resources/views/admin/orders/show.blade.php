<x-admin-layout title="Order {{ $order->order_number }}">

    {{-- Header --}}
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.orders.index') }}" class="p-2 rounded-xl text-[#6b7280] hover:text-[#1d4f72] hover:bg-[#eef6fb] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#1d4f72] mb-0.5">Orders</p>
                <h1 class="text-2xl font-semibold tracking-tight text-[#181818]">{{ $order->order_number }}</h1>
                <p class="text-xs text-[#9ca3af] mt-0.5">{{ $order->created_at->format('d F Y, H:i') }}</p>
            </div>
        </div>

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
        @endphp
        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold border {{ $statusColors[$order->status] ?? 'bg-gray-50 text-gray-500 border-gray-200' }}">
            {{ ucwords(str_replace('_', ' ', $order->status)) }}
        </span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Left: items + payment --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Order Items --}}
            <div class="rounded-[28px] border border-[#e7e2d8] bg-white shadow-[0_12px_35px_rgba(17,17,17,0.05)] overflow-hidden">
                <div class="px-6 py-5 border-b border-[#f0ece3]">
                    <h2 class="text-sm font-semibold text-[#181818]">Order Items</h2>
                </div>
                <div class="divide-y divide-[#f0ece3]">
                    @forelse($order->orderItems as $item)
                    @php
                        $imgSrc = $item->image
                            ? (str_starts_with($item->image, '/') || str_starts_with($item->image, 'http') ? $item->image : asset('images/' . ltrim($item->image, '/')))
                            : asset('images/products/Linen Blouse.jpg');
                    @endphp
                    <div class="px-6 py-4 flex items-center gap-4">
                        <div class="w-16 h-16 rounded-xl overflow-hidden bg-[#f7f5ef] border border-[#e7e2d8] flex-shrink-0">
                            <img src="{{ $imgSrc }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-[#181818]">{{ $item->product_name }}</p>
                            <p class="text-xs text-[#9ca3af] mt-0.5">
                                @if($item->size) Size: {{ $item->size }} @endif
                                @if($item->color) · Color: {{ $item->color }} @endif
                                · Qty: {{ $item->quantity }}
                            </p>
                            @if($item->product)
                            <a href="{{ route('admin.products.show', $item->product) }}" class="text-xs text-[#1d4f72] hover:underline mt-0.5 inline-block">View product →</a>
                            @endif
                        </div>
                        <div class="text-right flex-shrink-0">
                            <p class="font-semibold text-[#181818]">Rp {{ number_format($item->line_total, 0, ',', '.') }}</p>
                            <p class="text-xs text-[#9ca3af]">@ Rp {{ number_format($item->unit_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="px-6 py-8 text-center text-sm text-[#9ca3af]">No items found.</div>
                    @endforelse
                </div>

                {{-- Totals --}}
                <div class="px-6 py-4 bg-[#f7f6f2] border-t border-[#f0ece3] space-y-2">
                    <div class="flex justify-between text-sm text-[#4b5563]">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-sm text-[#4b5563]">
                        <span>Shipping ({{ ucfirst($order->shipping_method ?? 'standard') }})</span>
                        <span>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-base font-semibold text-[#181818] pt-2 border-t border-[#e7e2d8]">
                        <span>Total</span>
                        <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            {{-- Payment --}}
            <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-[#181818] mb-4">Payment Information</h2>
                <dl class="grid grid-cols-2 gap-x-8 gap-y-3 text-sm">
                    <div>
                        <dt class="text-xs text-[#9ca3af] uppercase tracking-wide mb-0.5">Method</dt>
                        <dd class="font-medium text-[#4b5563]">{{ ucwords(str_replace('_', ' ', $order->payment_method ?? '—')) }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-[#9ca3af] uppercase tracking-wide mb-0.5">Payment Status</dt>
                        @php $ps = $order->payment_status ?? '—'; $psColor = $ps === 'paid' ? 'text-emerald-600' : ($ps === 'failed' ? 'text-red-500' : 'text-amber-600'); @endphp
                        <dd class="font-semibold {{ $psColor }}">{{ ucfirst($ps) }}</dd>
                    </div>
                    @if($order->paid_at)
                    <div>
                        <dt class="text-xs text-[#9ca3af] uppercase tracking-wide mb-0.5">Paid At</dt>
                        <dd class="text-[#4b5563]">{{ $order->paid_at->format('d M Y H:i') }}</dd>
                    </div>
                    @endif
                    @if($order->midtrans_transaction_id)
                    <div>
                        <dt class="text-xs text-[#9ca3af] uppercase tracking-wide mb-0.5">Midtrans ID</dt>
                        <dd class="text-[#4b5563] font-mono text-xs break-all">{{ $order->midtrans_transaction_id }}</dd>
                    </div>
                    @endif
                    @if($order->midtrans_payment_type)
                    <div>
                        <dt class="text-xs text-[#9ca3af] uppercase tracking-wide mb-0.5">Payment Type</dt>
                        <dd class="text-[#4b5563]">{{ ucwords(str_replace('_', ' ', $order->midtrans_payment_type)) }}</dd>
                    </div>
                    @endif
                </dl>
            </div>
        </div>

        {{-- Right: customer + update status --}}
        <div class="space-y-5">

            {{-- Customer --}}
            <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-[#181818] mb-4">Customer</h2>
                <dl class="space-y-3 text-sm">
                    <div>
                        <dt class="text-xs text-[#9ca3af] uppercase tracking-wide mb-0.5">Name</dt>
                        <dd class="font-medium text-[#181818]">{{ $order->customer_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-[#9ca3af] uppercase tracking-wide mb-0.5">Email</dt>
                        <dd class="text-[#4b5563] break-all">{{ $order->email }}</dd>
                    </div>
                    @if($order->phone)
                    <div>
                        <dt class="text-xs text-[#9ca3af] uppercase tracking-wide mb-0.5">Phone</dt>
                        <dd class="text-[#4b5563]">{{ $order->phone }}</dd>
                    </div>
                    @endif
                    @if($order->address)
                    <div>
                        <dt class="text-xs text-[#9ca3af] uppercase tracking-wide mb-0.5">Shipping Address</dt>
                        <dd class="text-[#4b5563] leading-relaxed">{{ $order->address }}</dd>
                    </div>
                    @endif
                </dl>
            </div>

            {{-- Update Status --}}
            <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-[#181818] mb-1">Update Status</h2>

                @if(!empty($allowedTransitions))
                <p class="text-xs text-[#9ca3af] mb-4">Current: <span class="font-medium text-[#4b5563]">{{ ucwords(str_replace('_',' ',$order->status)) }}</span></p>
                <form method="POST" action="{{ route('admin.orders.status', $order) }}">
                    @csrf @method('PATCH')
                    <div class="space-y-2 mb-4">
                        @foreach($allowedTransitions as $transition)
                        @php
                            $transLabels = ['processing' => 'Mark Processing', 'shipped' => 'Mark Shipped', 'completed' => 'Mark Completed'];
                            $transColors = ['processing' => 'border-blue-300 text-blue-700', 'shipped' => 'border-sky-300 text-sky-700', 'completed' => 'border-emerald-300 text-emerald-700'];
                        @endphp
                        <label class="flex items-center gap-3 px-4 py-3 rounded-xl border {{ $transColors[$transition] ?? 'border-[#e7e2d8]' }} cursor-pointer hover:bg-[#f7f5ef] transition-colors group">
                            <input type="radio" name="status" value="{{ $transition }}" class="accent-[#1d4f72]" required>
                            <span class="text-sm font-medium">{{ $transLabels[$transition] ?? ucfirst($transition) }}</span>
                        </label>
                        @endforeach
                    </div>
                    <button type="submit"
                            class="w-full py-3 rounded-xl bg-[#1d4f72] text-white text-sm font-semibold shadow-[0_8px_20px_rgba(29,79,114,0.20)] hover:bg-[#153b54] transition-all">
                        Update Status
                    </button>
                </form>
                @else
                <div class="mt-3 flex items-center gap-2 px-4 py-3 rounded-xl bg-[#f7f6f2] border border-[#e7e2d8]">
                    <svg class="w-4 h-4 text-[#9ca3af] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <p class="text-xs text-[#6b7280]">
                        Status <span class="font-medium text-[#4b5563]">{{ ucwords(str_replace('_', ' ', $order->status)) }}</span> cannot be changed manually.
                    </p>
                </div>
                @endif
            </div>

            {{-- Timeline --}}
            <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-[#181818] mb-4">Order Timeline</h2>
                @php
                    $allSteps = [
                        'pending'    => ['label' => 'Order Placed',     'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                        'processing' => ['label' => 'Processing',       'icon' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
                        'shipped'    => ['label' => 'Shipped',          'icon' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8l1 12a2 2 0 002 2h8a2 2 0 002-2l1-12'],
                        'completed'  => ['label' => 'Delivered',        'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                    ];
                    $flowOrder = ['pending', 'pending_payment', 'processing', 'shipped', 'completed'];
                    $currentIdx = array_search($order->status, $flowOrder);
                @endphp
                <div class="space-y-3">
                    @foreach($allSteps as $key => $step)
                    @php
                        $stepIdx = array_search($key, $flowOrder);
                        $done    = $currentIdx !== false && $stepIdx <= $currentIdx;
                        $isCurrent = $order->status === $key || ($key === 'pending' && in_array($order->status, ['pending','pending_payment']));
                    @endphp
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0
                            {{ $done ? 'bg-[#1d4f72] shadow-[0_4px_12px_rgba(29,79,114,0.25)]' : 'bg-[#f0ece3] border border-[#e7e2d8]' }}">
                            <svg class="w-4 h-4 {{ $done ? 'text-white' : 'text-[#9ca3af]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $step['icon'] }}"/>
                            </svg>
                        </div>
                        <span class="text-sm {{ $done ? 'font-semibold text-[#181818]' : 'text-[#9ca3af]' }}">{{ $step['label'] }}</span>
                        @if($isCurrent && !in_array($order->status, ['completed','cancelled','expired','failed','payment_failed']))
                        <span class="ml-auto text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-[#eef6fb] text-[#1d4f72]">Current</span>
                        @endif
                    </div>
                    @endforeach

                    @if(in_array($order->status, ['cancelled','expired','failed','payment_failed']))
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 bg-red-100">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </div>
                        <span class="text-sm font-semibold text-red-600">{{ ucwords(str_replace('_',' ',$order->status)) }}</span>
                        <span class="ml-auto text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-red-50 text-red-600">Final</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
