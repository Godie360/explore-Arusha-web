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
        Schema::create('tours', function (Blueprint $table) {
            $table->id('TourID'); // Primary Key
            $table->string('Name');
            $table->text('Description')->nullable();
            $table->decimal('PricePerPerson', 8, 2);
            $table->string('Location')->nullable();
            $table->integer('Max_Participant');
            $table->integer('Min_Participant')->default(1);
            $table->string('Image')->nullable();
            $table->foreignId('CategoryID')->constrained('travel_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
