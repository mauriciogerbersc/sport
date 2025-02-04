<?php 

namespace Database\Factories;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition(): array
    {
        $team = Team::factory()->create();
        
        return [
            'first_name' => 'Jogador Admin',
            'last_name' => 'Sobrenome jogador',
            'position' => 'G',
            'country' => 'USA',
            'height' => '6-2',
            'weight' => '185',
            'jersey_number' => '30',
            'college' => 'Davidson',
            'draft_year' => 2009,
            'draft_round' => 1,
            'draft_number' => 7,
            'team_id' => $team->id, 
        ];
    }
}
