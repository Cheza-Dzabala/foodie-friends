<?php

namespace Database\Factories;

use App\Models\restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
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
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'restaurant_id' => $this->faker->randomElement(restaurant::pluck('id')),
            'is_active' => $this->faker->boolean()
        ];
    }
}
