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
        Schema::create('apartment_amenities', function (Blueprint $table) {
            $table->id('Apartment_AmenityID'); 
            $table->foreignId('ApartmentID')->constrained('apartments')->onDelete('cascade');
            $table->foreignId('Amenity_id')->constrained('amenities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment_amenities');
    }
};
