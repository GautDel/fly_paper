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
            $table->string('description', 500);
            $table->string('type', 50);
            $table->string('fish_species', 255);
            $table->string('tying', 500);
            $table->string('tactics', 500);
            $table->float('price', 4, 2);
            $table->string('img', 255);
            $table->boolean('popular')->default(false);
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
