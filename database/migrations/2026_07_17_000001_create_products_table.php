<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('name');
            $table->unsignedBigInteger('price');

            $table->string('image');
            $table->json('images');

            $table->json('sizes')->nullable();

            $table->unsignedInteger('stock')->default(0);

            $table->text('description')->nullable();
            $table->string('badge')->nullable();

            $table->string('category')->nullable();
            $table->string('condition')->nullable();
            $table->string('status')->default('available');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
