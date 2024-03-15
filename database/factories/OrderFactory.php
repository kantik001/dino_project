<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => Order::STATUS_CREATED,
            'total' => null,
            'user_id' => User::whereHas('roles', function($q) {
                $q->where('title', '!=', 'admin');
            })->inRandomOrder()->first()->id,
        ];

    }
}
