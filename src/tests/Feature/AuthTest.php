<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = $this->postJson('/user/login', [
            'email' => 'admin@example.com',
            'password' => 'password'
        ], [
            'X-Authorization' => 'tokenapisuperseguro',
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $response = $this->postJson('/user/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword'
        ], [
            'X-Authorization' => 'tokenapisuperseguro',
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(401)
            ->assertJson(['message' => 'Unauthorized']);
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = $this->postJson('/user/logout', [], [
            'Authorization' => "Bearer $token",
            'X-Authorization' => 'tokenapisuperseguro',
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
    }
}
