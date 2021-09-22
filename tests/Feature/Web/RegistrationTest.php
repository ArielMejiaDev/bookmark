<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $this->seed(RolesSeeder::class);

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => $email = 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();

        $user = User::query()->where('email', $email)->with('role')->first();

        $userRole = $user->role->description;

        $route = RouteServiceProvider::ROUTES_BY_ROLE[$userRole];

        $response->assertRedirect($route);
    }
}
