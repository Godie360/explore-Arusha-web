<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrator = User::updateOrCreate([
            'first_name' => 'Arusha',
            'middle_name' => 'Admin',
            'last_name' => 'TZ',
            'phone' => '07123456789',
            'email' => 'admin@arusha.co.tz',
        ], [
            'password' => Hash::make('arusha@2024'),
            'email_verified_at' => Carbon::now()
        ]);

        $role = Role::whereName("superadministrator")->first();
        if ($role) {
            $administrator->syncRoles([$role]);
        }
    }
}
