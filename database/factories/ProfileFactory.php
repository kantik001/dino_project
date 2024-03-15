<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'login' => fake()->emoji,
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'gender' => fake()->numberBetween(1,2),
            'birthed_at' => fake()->date,
            'balance' => fake()->numberBetween(1, 100),
        ];
    }
}
