<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->email(),
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'user_id' => 1
        ];
    }
}
