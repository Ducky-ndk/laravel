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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport_class_id');
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('location_id');
            $table->enum('day_of_the_week', ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su']);
            $table->time('time_of_day');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('schedule', ['normal', 'summer'])->default('normal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
