<?php

namespace Database\Seeders;

use App\Models\Company\CategoryModel;
use App\Models\CompanyCategoryModel;
use App\Models\CurrencyModel;
use App\Models\IdTypeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
