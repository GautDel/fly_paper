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
        Schema::create('fish_logs', function (Blueprint $table) {
            $table->id();
            $table->string('fish', 100);
            $table->float('weight', 6, 2);
            $table->string('mass_unit', 10);
            $table->float('fish_length', 6, 2);
            $table->string('length_unit', 10);
            $table->string('rod', 100);
            $table->string('rod_length', 20);
            $table->string('rod_weight', 20);
            $table->string('reel', 100);
            $table->string('reel_weight', 20);
            $table->string('line', 100);
            $table->string('line_weight', 10);
            $table->string('line_type', 25);
            $table->string('tippet', 100);
            $table->string('tippet_weight', 10);
            $table->string('fly', 100);
            $table->string('fly_category', 100);
            $table->string('hook_size', 10);
            $table->string('location', 255)->nullable();
            $table->string('weather', 40);
            $table->string('day_time', 40);
            $table->string('precise_time', 10)->nullable();
            $table->string('water_clarity', 100)->nullable();
            $table->string('water_movement', 100)->nullable();
            $table->string('note', 500)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish_logs');
    }
};
