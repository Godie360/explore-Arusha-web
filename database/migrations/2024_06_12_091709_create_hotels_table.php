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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('HotelID');
            $table->string('HotelName');
            $table->text('Description')->nullable();
            $table->string('Address')->nullable();
            $table->string('City');
            $table->string('Email')->unique();
            $table->string('Contact_Number')->nullable();
            $table->time('Check_in_time');
            $table->time('Check_out_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
