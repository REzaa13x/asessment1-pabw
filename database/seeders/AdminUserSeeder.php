<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the specific admin user you mentioned
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'), // Your specified password
                'role' => 'admin',
            ]
        );

        // Create the specific user you mentioned
        User::firstOrCreate(
            ['email' => 'fahreza@gmail.com'],
            [
                'name' => 'Fahreza',
                'password' => Hash::make('12345678'), // Your specified password
                'role' => 'donatur', // assuming this is a regular user
            ]
        );
    }
}