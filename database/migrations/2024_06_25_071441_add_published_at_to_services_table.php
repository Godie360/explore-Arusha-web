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
        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'published_at')) {
                $table->timestamp('published_at')->nullable()->after('review_count');
            }
            if (!Schema::hasColumn('services', 'lid')) {
                $table->string('lid')->after('id')->nullable();
            }
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (Schema::hasColumn('services', 'published_at')) {
                $table->dropColumn('published_at');
            }
        });
    }
};
