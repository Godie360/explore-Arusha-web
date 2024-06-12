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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id('ApartmentID'); 
            $table->string('ApartmentName');
            $table->text('ApartmentDescription')->nullable();
            $table->string('ApartmentHostName')->nullable();
            $table->string('ApartmentAddress')->nullable();
            $table->string('ApartmentLocation')->nullable();
            $table->decimal('ApartmentPrice', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
