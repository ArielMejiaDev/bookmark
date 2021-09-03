<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Editor;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        Admin::factory()->create([
            'email' => 'arielmejiadev@gmail.com',
            'name' => 'Ariel Mejia Dev'
        ]);

        Admin::factory()->create([
            'email' => 'admin@mail.com',
            'name' => 'Admin'
        ]);

        Admin::factory()->times(10)->create();

        Editor::factory()->create([
            'email' => 'editor@mail.com',
            'name' => 'Editor'
        ]);

        Editor::factory()->times(10)->create();

        User::factory()->create([
            'email' => 'user@mail.com',
            'name' => 'User',
        ]);

        User::factory()->times(10)->create();
    }
}
