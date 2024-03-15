<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'value'=> fake()->numberBetween(1,100),
            'status'=> fake()->numberBetween(1,4),
            'user_id'=> User::inRandomOrder()->first()->id,
            'order_id'=> Order::inRandomOrder()->first()->id,
        ];
    }
}
