<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_status')->default('pending')->after('payment_method');
            $table->string('midtrans_transaction_id')->nullable()->after('payment_status');
            $table->string('midtrans_order_id')->nullable()->after('midtrans_transaction_id');
            $table->string('midtrans_payment_type')->nullable()->after('midtrans_order_id');
            $table->string('midtrans_fraud_status')->nullable()->after('midtrans_payment_type');
            $table->string('snap_token')->nullable()->after('midtrans_fraud_status');
            $table->text('snap_redirect_url')->nullable()->after('snap_token');
            $table->timestamp('paid_at')->nullable()->after('snap_redirect_url');
            $table->timestamp('payment_expired_at')->nullable()->after('paid_at');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'payment_status',
                'midtrans_transaction_id',
                'midtrans_order_id',
                'midtrans_payment_type',
                'midtrans_fraud_status',
                'snap_token',
                'snap_redirect_url',
                'paid_at',
                'payment_expired_at',
            ]);
        });
    }
};
