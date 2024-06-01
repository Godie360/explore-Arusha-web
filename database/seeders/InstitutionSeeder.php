<?php

namespace Database\Seeders;

use App\Models\InstitutionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institutes = [
            [
                'name' => 'Arusha Regional Administrator\'s Office',
                'type' => 'Government',
                'contact_person_name' => 'John Doe',
                'contact_person_phone' => '+255-123-456-789',
                'contact_person_email' => 'admin@arusha.gov',
                'address' => '123 Main Street, Arusha',
            ],
            [
                'name' => 'Arusha Administrative Support Office',
                'type' => 'Government',
                'contact_person_name' => 'Jane Doe',
                'contact_person_phone' => '+255-987-654-321',
                'contact_person_email' => 'support@arusha.gov',
                'address' => '456 First Avenue, Arusha',
            ],
            [
                'name' => 'Arusha Police Department Headquarters',
                'type' => 'Government',
                'contact_person_name' => 'Mike Smith',
                'contact_person_phone' => '+255-111-222-333',
                'contact_person_email' => 'police@arusha.gov',
                'address' => '789 Elm Street, Arusha',
            ],
        ];

        foreach ($institutes as $institute) {
            InstitutionModel::create($institute);
        }
    }
}
