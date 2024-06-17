<?php

use App\Enums\CompanyStatusEnum;
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
        Schema::table('staffs', function (Blueprint $table) {
            if (!Schema::hasColumn('staffs', 'system_number')) {
                $table->string("system_number")->after('id');
            }
            if (!Schema::hasColumn('staffs', 'gender')) {
                $table->string("gender")->after('id_type_id');
            }
            if (!Schema::hasColumn('staffs', 'date_of_birth')) {
                $table->date("date_of_birth")->after('gender');
            }
            if (!Schema::hasColumn('staffs', 'education')) {
                $table->string("education")->nullable()->after('date_of_birth');
            }
            if (!Schema::hasColumn('staffs', 'bio')) {
                $table->string("bio")->nullable()->after('education');
            }

            if (!Schema::hasColumn('staffs', 'work_experience')) {
                $table->string("work_experience")->after('bio');
            }
            if (!Schema::hasColumn('staffs', 'status')) {
                $table->string("status")->default(CompanyStatusEnum::Active->value)->after('work_experience');
            }
            if (!Schema::hasColumn('staffs', 'country_id')) {
                $table->uuid('country_id')->after('staff_type_id');
                $table->foreign("country_id")->references("id")->on("countries");
            }
            if (!Schema::hasColumn('staffs', 'profile_photo_path')) {
                $table->string("profile_photo_path")->nullable()->after('country_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staffs', function (Blueprint $table) {
            //
        });
    }
};
