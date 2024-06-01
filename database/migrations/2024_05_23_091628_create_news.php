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
        Schema::create('tags', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("secure_token")->unique();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('news_categories', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("slug");
            $table->string("name");
            $table->timestamps();
        });
        Schema::create('news', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("slug");
            $table->string("futured_image");
            $table->string('video_url')->nullable();
            $table->string('status')->default('published');
            $table->string("news_category_id");
            $table->foreign("news_category_id")->references("id")->on("news_categories");
            $table->string("user_id");
            $table->string("token")->unique();
            $table->foreign("user_id")->references("id")->on("users");
            $table->double("view_count")->default(0);
            $table->timestamps();
        });
        Schema::create('news_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('news_id');
            $table->foreign('news_id')->references('id')->on('news')->cascadeOnUpdate();
            $table->string('title');
            $table->mediumText('short_description');
            $table->text('description');
            $table->uuid('created_by');
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnUpdate();
            $table->timestamps();
        });
        Schema::create('news_tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('news_id');
            $table->nullableUuidMorphs('model');
            $table->uuid('created_by');
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnUpdate();
            $table->timestamps();
        });
        Schema::create('category_news', function (Blueprint $table) {
            $table->uuid('news_category_model_id');
            $table->foreign('news_category_model_id')->references('id')->on('news_categories')->onDelete('cascade');
            $table->uuid('news_model_id');
            $table->foreign('news_model_id')->references('id')->on('news')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
        Schema::dropIfExists('news_categories');
        Schema::dropIfExists('news_details');
    }
};
