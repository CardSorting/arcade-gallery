<?php

namespace Database\Factories;

use App\Models\StoreListing;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreListingFactory extends Factory
{
    protected $model = StoreListing::class;

    public function definition()
    {
        return [
            'game_id' => \App\Models\Game::factory(),
            'developer' => $this->faker->company(),
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraphs(3, true),
            'icon' => 'https://picsum.photos/200',
            'screenshots' => [
                'https://picsum.photos/800/600',
                'https://picsum.photos/800/600',
                'https://picsum.photos/800/600'
            ],
            'category' => $this->faker->randomElement(['Action', 'Adventure', 'Puzzle', 'Strategy']),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'distribution' => $this->faker->randomElement(['Free', 'Paid', 'Subscription']),
            'is_featured' => $this->faker->boolean(20),
            'published_at' => $this->faker->optional(80)->dateTimeBetween('-1 year', 'now')
        ];
    }
}
