<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayerTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $user;
    protected $adminToken;
    protected $userToken;
    protected $team;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create(['role' => 'admin']);
        $this->user = User::factory()->create(['role' => 'user']);

        $this->team = Team::factory()->create();

        $this->adminToken = $this->admin->createToken('admin_token')->plainTextToken;
        $this->userToken = $this->user->createToken('user_token')->plainTextToken;
    }

    public function test_admin_can_create_player()
    {
        $response = $this->postJson('/players', [
            'first_name' => 'Jogador Admin',
            'last_name' => 'Sobrenome jogador',
            'position' => 'G',
            'country' => 'USA',
            'height' => '6-2',
            'weight' => '185',
            'jersey_number' => '30',
            'college' => 'Davidson',
            'country' => 'USA',
            'draft_year' => 2009,
            'draft_round' => 1,
            'draft_number' => 7,
            'team_id' => $this->team->id
        ], [
            'Authorization' => "Bearer $this->adminToken",
            'Accept' => 'application/json',
            'X-Authorization' => 'tokenapisuperseguro'
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Registro criado com sucesso']);
    }

    public function test_user_can_create_player()
    {
        $response = $this->postJson('/players', [
            'first_name' => 'Jogador Admin',
            'last_name' => 'Sobrenome jogador',
            'position' => 'G',
            'country' => 'USA',
            'height' => '6-2',
            'weight' => '185',
            'jersey_number' => '30',
            'college' => 'Davidson',
            'country' => 'USA',
            'draft_year' => 2009,
            'draft_round' => 1,
            'draft_number' => 7,
            'team_id' => $this->team->id
        ],  [
            'Authorization' => "Bearer $this->adminToken",
            'Accept' => 'application/json',
            'X-Authorization' => 'tokenapisuperseguro'
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Registro criado com sucesso']);
    }

    public function test_user_can_update_player()
    {
        $player = Player::factory()->create();

        $response = $this->putJson("/players/{$player->id}", [
            'first_name' => 'Jogador',
            'last_name' => 'Atualizado'
        ], [
            'Authorization' => "Bearer $this->adminToken",
            'Accept' => 'application/json',
            'X-Authorization' => 'tokenapisuperseguro'
        ]);

        $response->assertStatus(201)
            ->assertJson(['message' => 'Registro atualizado com sucesso']);
    }

    public function test_admin_can_delete_player()
    {
        $player = Player::factory()->create();

        $response = $this->deleteJson("/players/{$player->id}", [],  [
            'Authorization' => "Bearer $this->adminToken",
            'Accept' => 'application/json',
            'X-Authorization' => 'tokenapisuperseguro'
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Registro removido com sucesso']);
    }

    public function test_user_cannot_delete_player()
    {
        $player = Player::factory()->create();

        $response = $this->deleteJson("/players/{$player->id}", [], [
            'Authorization' => "Bearer $this->userToken",
            'Accept' => 'application/json',
            'X-Authorization' => 'tokenapisuperseguro'
        ]);

        $response->assertStatus(403);
    }
}
