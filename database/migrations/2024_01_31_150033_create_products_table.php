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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 1000);
            $table->string('image', 255);
            $table->float('price', 6, 2);
            $table->boolean('in_stock')->default(false);
            $table->boolean('new')->default(true);
            $table->boolean('sale')->default(false);
            $table->tinyInteger('sale_percent')->default(0);
            $table->string('brand', 100);
            $table->foreignId('product_category_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
