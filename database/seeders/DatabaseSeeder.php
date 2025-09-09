<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles first
        $this->call(RoleSeeder::class);

        // Create admin user
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'role_id' => 1, // Admin role
        ]);

        // Create regular user
        User::factory()->create([
            'name' => 'Usuario Test',
            'email' => 'user@example.com',
            'role_id' => 2, // User role
        ]);
    }
}
