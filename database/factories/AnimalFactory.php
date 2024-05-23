<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['dog', 'cat', 'bunny', 'bird', 'turtle'];
        $type = fake()->randomElement($types);
    
        return [
            'name' => fake()->firstName(),
            'type' => $type,
            'age' => fake()->numberBetween(0, 20),
            'gender' => fake()->randomElement(['male', 'female']),
            'weight' => fake()->randomFloat(2, 0, 30),
            'adopted' => false,
            'user_id' => 1
        ];
    }
}
