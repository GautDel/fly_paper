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
        Schema::create('fish_species', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 1000);
            $table->foreignId('fish_species_category_id')->constrained()->onDelete('cascade');
            $table->string('tactics', 1000);
            $table->string('water', 1000);
            $table->string('environment', 1000);
            $table->string('image', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish_species');
    }
};
