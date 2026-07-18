<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MidtransPaymentController extends Controller
{
    public function finish(Request $request, Order $order, MidtransService $midtrans)
    {
        $this->authorizeCustomerOrder($order);

        $midtrans->applyOrderStatus($order, 'paid', 'paid');

        return redirect()
            ->route('order-confirmation', ['order' => $order->id])
            ->with('success', 'Payment completed. We are confirming your order.');
    }

    public function unfinish(Request $request, Order $order, MidtransService $midtrans)
    {
        $this->authorizeCustomerOrder($order);

        $midtrans->applyOrderStatus($order, 'pending', 'pending_payment');

        return redirect()
            ->route('order-confirmation', ['order' => $order->id])
            ->with('success', 'Payment is still pending.');
    }

    public function error(Request $request, Order $order, MidtransService $midtrans)
    {
        $this->authorizeCustomerOrder($order);

        $midtrans->applyOrderStatus($order, 'failed', 'payment_failed');

        return redirect()
            ->route('order-confirmation', ['order' => $order->id])
            ->withErrors(['payment' => 'Payment failed. Please try again.']);
    }

    public function webhook(Request $request, MidtransService $midtrans): Response
    {
        $payload = $request->all();

        if (! $midtrans->validSignature($payload)) {
            return response('Invalid signature.', 403);
        }

        $order = Order::where('order_number', $payload['order_id'] ?? null)->first();

        if (! $order) {
            return response('Order not found.', 404);
        }

        $midtrans->applyNotification($order, $payload);

        return response('OK');
    }

    private function authorizeCustomerOrder(Order $order): void
    {
        abort_unless(auth()->check() && $order->user_id === auth()->id(), 403);
    }
}
