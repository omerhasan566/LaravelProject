<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $adminRole = Role::updateOrCreate(['name' => 'admin']);
        $userRole = Role::updateOrCreate(['name' => 'user']);

        $adminUser = User::updateOrCreate(
            ['email' => 'admin@mysite.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'),
            ]
        );

        if (!$adminUser->roles()->where('role_id', $adminRole->id)->exists()) {
            $adminUser->roles()->attach($adminRole->id);
        }

        $regularUser = User::updateOrCreate(
            ['email' => 'user@mysite.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password123'),
            ]
        );

        if (!$regularUser->roles()->where('role_id', $userRole->id)->exists()) {
            $regularUser->roles()->attach($userRole->id);
        }
    }
}