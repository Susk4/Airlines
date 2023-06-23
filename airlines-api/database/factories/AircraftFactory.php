<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aircraft>
 */
class AircraftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word,
            'economy' => $this->faker->numberBetween(10,100),
            'business' => $this->faker->numberBetween(10,100),
            'first_class' => $this->faker->numberBetween(10,100),
        ];
    }
}
