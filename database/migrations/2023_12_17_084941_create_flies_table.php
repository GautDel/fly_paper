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
        Schema::create('flies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->foreignId('fly_category_id')->constrained()->onDelete('cascade');
            $table->string('description', 1000);
            $table->string('fish_species', 255);
            $table->string('tying', 1000);
            $table->string('tactics', 1000);
            $table->string('image', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flies');
    }
};
