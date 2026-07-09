<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'items',
        'subtotal',
        'shipping_cost',
        'total',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
