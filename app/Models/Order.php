<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'customer_name',
        'email',
        'phone',
        'address',
        'shipping_method',
        'payment_method',
        'payment_status',
        'midtrans_transaction_id',
        'midtrans_order_id',
        'midtrans_payment_type',
        'midtrans_fraud_status',
        'snap_token',
        'snap_redirect_url',
        'paid_at',
        'payment_expired_at',
        'items',
        'subtotal',
        'shipping_cost',
        'total',
    ];

    protected $casts = [
        'items' => 'array',
        'paid_at' => 'datetime',
        'payment_expired_at' => 'datetime',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
