<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RestaurantStaff>
 */
class RestaurantStaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'name' => fake()->firstName(),
            'gender' =>  fake()->word(1),
            'email' => fake()->firstName() . '@' . fake()->freeEmailDomain(),
            'password' => 'password',
            'phone' => fake()->numberBetween(7),
            'address' => fake()->word(2),
        ];
    }
}
