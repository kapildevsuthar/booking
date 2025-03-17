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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('firm_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('week',['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']);
            $table->enum('shift',['Morning','Evening','full_day'])->nullable();
            $table->string('start_from');
            $table->string('end_from');
            $table->integer('max_booking');
            $table->timestamps();
            $table->foreign('firm_id')->references('id')->on('firms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
