<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
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
            'price' => $this->faker->randomFloat(2, 1, 100),
            'menu_id' => $this->faker->randomElement(\App\Models\Menu::pluck('id')),
            'is_active' => $this->faker->boolean(),
            'image' => $this->faker->imageUrl(),
            'ingredients' => $this->faker->text(),
        ];
    }
}
