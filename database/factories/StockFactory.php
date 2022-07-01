<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "post_id" =>  Post::inRandomOrder()->first()->id,
            "size" =>$this->faker->stateAbbr,
            "stock" => $this->faker->numberBetween(0,1000),
        ];
    }
}
