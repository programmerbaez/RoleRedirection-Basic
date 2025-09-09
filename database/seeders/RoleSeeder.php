<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Administrador',
            'slug' => 'admin',
            'description' => 'Usuario con acceso completo al sistema',
        ]);

        Role::create([
            'name' => 'Usuario',
            'slug' => 'user',
            'description' => 'Usuario estándar con acceso limitado',
        ]);
    }
}
