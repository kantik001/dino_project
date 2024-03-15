<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promocode>
 */
class PromocodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code'=> fake()->word,
            'value'=> fake()->numberBetween(1,100),
            'expired_at'=> fake()->date,
            'limit_from'=> fake()->numberBetween(101,1000),
            'user_id'=> User::inRandomOrder()->first()->id,


        ];
    }
}
