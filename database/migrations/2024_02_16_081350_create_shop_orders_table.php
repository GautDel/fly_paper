<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            $table->string('status', 50);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('address_1', 255);
            $table->string('address_2', 255)->nullable();
            $table->string('city', 255);
            $table->string('state_province', 255);
            $table->string('zip', 255);
            $table->string('country', 255);
            $table->float('total_price', 6, 2);
            $table->foreignId('shipping_address_id');
            $table->foreignId('user_id');
            $table->foreignId('shopping_cart_id');
            $table->string('session_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_orders');
    }
};
