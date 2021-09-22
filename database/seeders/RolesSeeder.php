<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $adminRoleExists = Role::query()->where('description', 'Admin')->exists();
        if (!$adminRoleExists) {
            Role::factory()->create(['description' => 'Admin']);
        };

        $editorRoleExists = Role::query()->where('description', 'Editor')->exists();
        if (!$editorRoleExists) {
            Role::factory()->create(['description' => 'Editor']);
        };

        $userRoleExists = Role::query()->where('description', 'User')->exists();
        if (!$userRoleExists) {
            Role::factory()->create(['description' => 'User']);
        };
    }
}
