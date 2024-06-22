<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CountrySeeder::class);
        $this->call(GeneralSeeder::class);
        // $this->call(LaratrustSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(InstitutionSeeder::class);
        // $this->call(NewsCategorySeeder::class);
        // $this->call(ServiceSeeder::class);
    }
}
