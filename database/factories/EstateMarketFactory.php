<?php

namespace Database\Factories;

use App\Models\EstateMarket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EstateMarketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = EstateMarket::class;

    public function definition(): array
    {
        return [
            'number_of_deals' => fake()->numberBetween(1, 20),
            'deal_value' => fake()->numberBetween(100, 10000),
            'circulating_space' => fake()->numberBetween(1000, 50000),
            'max_price' => fake()->numberBetween(1, 10),
            'average_price' => fake()->numberBetween(100, 1000),
            'min_price' => fake()->numberBetween(1, 5),
            'best_order' => fake()->numberBetween(1, 10),
            'best_supply' => fake()->numberBetween(1, 10)
        ];
    }
}
