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
        Schema::create('firms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Make it nullable for onDelete('set null')
            $table->string('firm_name')->unique();
            $table->string('firm_mobile');
            $table->string('pincode');
            $table->date('since')->nullable();
            $table->string('street');
            $table->string('landmark');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pan_no')->nullable();
            $table->string('map')->nullable();
            $table->string('register_no')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('profilepic')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->Delete('set null');
            $table->softdeletes();
    
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firms');
    }
};
