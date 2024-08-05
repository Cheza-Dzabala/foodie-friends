<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'logo' => $this->faker->imageUrl(),
            'description' => $this->faker->text(),
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'city_id' => $this->faker->randomElement(\App\Models\City::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id'))
        ];
    }
}
