<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'git_repository_id' => null,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraphs(3, true),
            'status' => 'approved',
            'url' => $this->faker->url(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}
