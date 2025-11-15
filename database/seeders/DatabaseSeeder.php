<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run the admin user seeder first
        $this->call(AdminUserSeeder::class);

        // Create a sample donatur user for testing
        User::factory()->create([
            'name' => 'Test Donatur',
            'email' => 'donatur@gmail.com',
            'role' => 'donatur',
        ]);
    }
}
