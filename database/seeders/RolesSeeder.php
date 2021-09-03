<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::factory()->create([
            'description' => 'Admin'
        ]);

        Role::factory()->create([
            'description' => 'Editor'
        ]);

        Role::factory()->create([
            'description' => 'User'
        ]);
    }
}
