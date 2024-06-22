<?php

namespace Database\Seeders;

use App\Enums\CompanyStatusEnum;
use App\Enums\CompanyTypeEnum;
use App\Models\Company\CategoryModel;
use App\Models\Company\CompanyModel;
use App\Models\Company\StaffModel;
use App\Models\Company\StaffTypeModel;
use App\Models\CompanyCategoryModel;
use App\Models\CountryModel;
use App\Models\CurrencyModel;
use App\Models\DistrictModel;
use App\Models\IdTypeModel;
use App\Models\RegionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GeneralSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $id_types = [
            'National Identification Number (NIN)',
            'Voters registration number',
            'Passport number',
            'Driving license',
            'Zanzibar Resident Id(ZANID)',
            'Tax Identification Number (TIN)',
            'Company Incorporation Certificate Number',
        ];
        foreach ($id_types as $id_type) {
            IdTypeModel::updateOrCreate([
                "name" => $id_type
            ], ["description" => $id_type]);
        }
        $company_categories = [
            [
                "name" => "Hospitality and Tourism",
                "icon" => "fa-hotel"
            ],
            [
                "name" => "Food and Beverage",
                "icon" => "fa-utensils"
            ],
            [
                "name" => "Travel and Transportation",
                "icon" => "fa-plane"
            ],
            [
                "name" => "Logistics and Supply Chain",
                "icon" => "fa-truck"
            ],
            [
                "name" => "Real Estate and Property Management",
                "icon" => "fa-building"
            ]
        ];
        foreach ($company_categories as $company_category) {
            $cpc =   CategoryModel::updateOrCreate(
                [
                    "name" => $company_category['name']
                ],
                [
                    "description" => $company_category['name'],
                    "icon" => $company_category['icon'],
                ]
            );
        }
        $companies = [];
        $categoryIds = CategoryModel::pluck('id')->toArray();
        // Get all enum cases
        $cases = CompanyTypeEnum::cases();
        // Select a random case
        $randomCase = $cases[array_rand($cases)];
        $country = CountryModel::where('code', 'TZA')->first();
        $region = RegionModel::where('name', 'Arusha')->first();
        $districtIds = DistrictModel::where('region_id', $region->id)->pluck('id')->toArray();
        $IdTypeModelIds = IdTypeModel::pluck('id')->toArray();
        // Generate 10 companies
        for ($i = 0; $i < 10; $i++) {
            $company = [
                'company_category_id' => $faker->randomElement($categoryIds),
                'company_type' => $randomCase->value,
                'company_name' => $faker->company,
                'business_name' => $faker->companySuffix,
                'country_id' => $country->id,
                'region_id' => $region->id,
                'district_id' => $faker->randomElement($districtIds),
                'physical_address' => $faker->address,
                'street_address' => $faker->streetAddress,
                'company_email' => $faker->unique()->safeEmail,
                'company_phone' => $faker->phoneNumber,
                'year_of_establishment' => $faker->numberBetween(1950, 2023),
                'number_of_employees' => $faker->numberBetween(1, 1000),
                'contact_person_name' => $faker->name,
                'contact_person_title' => $faker->jobTitle,
                'contact_person_phone' => $faker->phoneNumber,
                'contact_person_email' => $faker->safeEmail,
                'description' => $faker->sentence,
                'status' => 1, // Approved status
            ];
            $companyModel =  CompanyModel::create($company);
        }
        $companies = CompanyModel::all();
        foreach ($companies as $company) {
            if ($company) {
                for ($i = 0; $i < 8; $i++) {
                    $staffTypes[] = [
                        'name' => $faker->jobTitle,
                        'description' => $faker->sentence,
                    ];
                }
                // Insert staff types into the database
                foreach ($staffTypes as $type) {
                    StaffTypeModel::create([
                        'name' => $type['name'],
                        'description' => $type['description'],
                        'company_id' => $company->id
                    ]);
                }
                $StaffTypeModelIds = StaffTypeModel::pluck('id')->toArray();
                for ($i = 0; $i < 10; $i++) {
                    $staff = [
                        'first_name' => $faker->firstName,
                        'middle_name' => $faker->lastName,
                        'last_name' => $faker->lastName,
                        'email' => $faker->unique()->safeEmail,
                        'phone' => $faker->phoneNumber,
                        'address' => $faker->address,
                        'id_number' => $faker->uuid,
                        'id_type_id' => $faker->randomElement($IdTypeModelIds),
                        'gender' => $faker->randomElement(['M', 'F']),
                        'date_of_birth' => $faker->date(),
                        'education' => $faker->sentence,
                        'bio' => $faker->sentence,
                        'work_experience' => $faker->sentence,
                        'status' => CompanyStatusEnum::Active->value,
                        'company_id' => $company->id,
                        'country_id' =>  $country->id,
                        'profile_photo_path' => null,
                        'staff_type_id' =>  $faker->randomElement($StaffTypeModelIds)
                    ];
                    $newStaff = StaffModel::create($staff);
                }
            }
        }
    }
}
