<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
    public function definition()
    {
        return [
            'transaction_id' => fake()->unique()->numberBetween(10000,99999999),
            'user_id' => User::inRandomOrder()->first()->id,
            'location_id' => Location::inRandomOrder()->first()->id,
            'amount' => fake()->randomDigit(),
            'transaction_type' => Arr::random(['Credit','Debit']),
            'status' => Arr::random(['Success','Failed','Pending'])
        ];
    }
}
