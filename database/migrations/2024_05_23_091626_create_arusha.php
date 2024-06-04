<?php

use App\Enums\ComplaintStatusEnum;
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
        Schema::create('countries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('code')->unique();
        });
        Schema::create('regions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('code')->unique();
        });
        Schema::create('districts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('code')->unique();
            $table->uuid('region_id');
            $table->foreign('region_id')->references('id')->on('regions')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create("company_categories", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("icon");
            $table->string("name");
            $table->string("slug");
            $table->mediumText("description");
            $table->timestamps();
        });
        Schema::create("document_types", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("name");
            $table->string("key");
            $table->timestamps();
        });
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('company_id')->unique();
            $table->string("company_category_id");
            $table->foreign("company_category_id")->references("id")->on("company_categories");
            $table->string('company_type');
            $table->string('company_name');
            $table->string('business_name');
            $table->uuid('country_id');
            $table->foreign("country_id")->references("id")->on("countries");
            $table->uuid('region_id');
            $table->foreign("region_id")->references("id")->on("regions");
            $table->string('district_id');
            $table->foreign("district_id")->references("id")->on("districts");
            $table->string('physical_address')->nullable();
            $table->string('street_address')->nullable();
            $table->string('company_email')->unique();
            $table->string('company_phone');
            $table->year('year_of_establishment');
            $table->integer('number_of_employees');
            $table->string('licence_number')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('tin_number')->nullable();
            $table->string("website")->nullable();
            $table->string('contact_person_name');
            $table->string('contact_person_title');
            $table->string('contact_person_phone');
            $table->string('contact_person_email')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover_photo')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp("approved_at")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->timestamps();
        });
        Schema::create('company_users', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('user_id');
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('company_id');
            $table->foreign("company_id")->references("id")->on("companies")->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger("authorized")->default(0);
            $table->timestamps();
        });
        Schema::create("company_documents", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("company_id");
            $table->foreign("company_id")->references("id")->on("companies");
            $table->string("document_type_id");
            $table->foreign("document_type_id")->references("id")->on("document_types");
            $table->string("key");
            $table->string("name");
            $table->string("attachment");
            $table->timestamps();
        });
        Schema::create('id_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->mediumText('description')->nullable();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'address')) {
                $table->string("address")->nullable()->after('password');
            }
            if (!Schema::hasColumn('users', 'id_type_id')) {
                $table->string("id_type_id")->nullable()->after('address');
                $table->foreign("id_type_id")->references("id")->on("id_types");
            }
            if (!Schema::hasColumn('users', 'id_number')) {
                $table->string("id_number")->nullable()->after('id_type_id');
            }
        });
        Schema::create('staff_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->string("company_id");
            $table->foreign("company_id")->references("id")->on("companies");
            $table->timestamps();
        });
        Schema::create("staffs", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string("id_number");
            $table->string("email")->nullable();
            $table->string("phone");
            $table->string("address");
            $table->string("company_id");
            $table->foreign("company_id")->references("id")->on("companies");
            $table->string("staff_type_id");
            $table->foreign("staff_type_id")->references("id")->on("staff_types");
            $table->string("id_type_id");
            $table->foreign("id_type_id")->references("id")->on("id_types");
            $table->timestamps();
        });
        Schema::create('otps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('otp');
            $table->nullableUuidMorphs('varifiable');
            $table->timestamp('is_validated')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create("categories", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("name");
            $table->string("icon");
            $table->string("slug")->unique();
            $table->mediumText("description")->nullable();
            $table->timestamps();
        });
        Schema::create("sub_categories", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("name");
            $table->string("icon");
            $table->string("slug")->unique();
            $table->mediumText("description")->nullable();
            $table->string("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
        Schema::create("currencies", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("name");
            $table->string("code");
            $table->string("exchange_rate")->default(1);
            $table->timestamps();
        });
        Schema::create("services", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("title");
            $table->string("featured_image");
            $table->string("slug")->unique();
            $table->string("short_description");
            $table->mediumText("description");
            $table->string("promo_video")->nullable();
            $table->string("website");
            $table->string("address");
            $table->string("phone");
            $table->string("email");
            $table->json("location")->nullable();
            $table->double("min_price")->default(0);
            $table->double("max_price")->default(0);
            $table->string("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("sub_category_id");
            $table->foreign("sub_category_id")->references("id")->on("sub_categories")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("currency_id");
            $table->foreign("currency_id")->references("id")->on("currencies")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("company_id");
            $table->foreign("company_id")->references("id")->on("companies");
            $table->string("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamp("verified_at")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->tinyInteger("views_count")->default(0);
            $table->tinyInteger("rate")->default(0);
            $table->tinyInteger("review_count")->default(0);
            $table->timestamps();
        });
        Schema::create("amenities", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("company_id");
            $table->foreign("company_id")->references("id")->on("companies");
            $table->string("name");
            $table->string("icon");
            $table->timestamps();
        });
        Schema::create("service_amenities", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("service_id");
            $table->foreign("service_id")->references("id")->on("services");
            $table->string("amenity_id");
            $table->foreign("amenity_id")->references("id")->on("amenities");
            $table->timestamps();
        });
        Schema::create('files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('file');
            $table->nullableUuidMorphs('filable');
            $table->string("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->mediumText("body");
            $table->tinyInteger("rate")->default(0);
            $table->string("company_id");
            $table->foreign("company_id")->references("id")->on("companies");
            $table->string("name")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->nullableUuidMorphs('reviable');
            $table->timestamps();
        });
        Schema::create('views', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->nullableUuidMorphs('viewable');
            $table->mediumText("agent")->nullable();
            $table->string("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('institutions', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("slug");
            $table->string("name");
            $table->string("type")->nullable();
            $table->string("contact_person_name")->nullable();
            $table->string("contact_person_phone")->nullable();
            $table->string("contact_person_email")->nullable();
            $table->string("address")->nullable();
            $table->timestamps();
        });
        Schema::create('complaints', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("institution_id");
            $table->foreign("institution_id")->references("id")->on("institutions");
            $table->string('complaint_type');
            $table->string('personal_responsible')->nullable();
            $table->longText('description');
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->default(ComplaintStatusEnum::Pending->value);
            $table->mediumText('agent')->nullable();
            $table->dateTime('readed_on')->nullable();
            $table->dateTime('completed_on')->nullable();
            $table->uuid('user_id')->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
        Schema::create('suggestions', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("institution_id");
            $table->foreign("institution_id")->references("id")->on("institutions");
            $table->longText('description');
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->default(ComplaintStatusEnum::Pending->value);
            $table->mediumText('agent')->nullable();
            $table->dateTime('readed_on')->nullable();
            $table->uuid('user_id')->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
        Schema::create('contacts', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->longText('message')->nullable();
            $table->mediumText('agent')->nullable();
            $table->dateTime('readed_on')->nullable();
            $table->timestamps();
        });
        Schema::create('galleries', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('name');
            $table->longText('description');
            $table->string("futured_image")->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('views');
        Schema::dropIfExists('reviews');
    }
};
