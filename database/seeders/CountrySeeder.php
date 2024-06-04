<?php

namespace Database\Seeders;

use App\Models\CountryModel;
use App\Models\CurrencyModel;
use App\Models\DistrictModel;
use App\Models\RegionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $currencyFilePath = public_path('data/CURRENCIES.xlsx');
        if (!file_exists($currencyFilePath)) {
            $this->command->error('Seeder error: ',   'Excel file not found.');
        }
        $currencies = excel_to_array($currencyFilePath);
        foreach ($currencies as $currency) {
            $cur = CurrencyModel::updateOrCreate(['code' => $currency['CODE']], ['name' => $currency['CURRENCY']]);
        }
        $this->command->info("Currency done");
        $countryFilePath = public_path('data/Countries.xlsx');
        if (!file_exists($countryFilePath)) {
            $this->command->error('Seeder error: ',   'Country Excel file not found.');
        }
        $countries = excel_to_array($countryFilePath);
        foreach ($countries as $country) {
            $cur = CountryModel::updateOrCreate(['code' => trim($country['CODE'])], ['name' => trim($country['COUNTRY'])]);
        }
        $this->command->info("Country done");
        $regionFilePath = public_path('data/RegionsandRespectiveDistricts.xlsx');
        if (!file_exists($regionFilePath)) {
            $this->command->error('Seeder error: ',   'Excel file not found.');
        }
        $regionsData = region_excel_to_array($regionFilePath);
        foreach ($regionsData as $region) {
            $reg = RegionModel::updateOrCreate(['code' => trim($region['region_code'])], ['name' => trim($region['region_name'])]);
            if ($reg) {
                foreach ($region['districts'] as $district) {
                    $dis = DistrictModel::updateOrCreate(['code' => trim($district['district_code'])], ['name' => trim($district['district_name']), 'region_id' => $reg->id]);
                }
            }
        }
        $this->command->info("Region and district done");
    }
}
