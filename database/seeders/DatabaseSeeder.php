<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Restaurant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Default User',
            'email' => 'admin@eatapp.com',
            'is_admin' => true,
        ]);
        User::factory(10)->create([
            'password' => bcrypt('password'),
        ]);
        City::factory(10)->create();
        foreach (User::all() as $user) {
            Restaurant::factory(1)->create([
                'user_id' => $user->id,
            ]);
        }
        foreach (Restaurant::all() as $restaurant) {
            $restaurant->menus()->createMany(
                Menu::factory(10)->make()->toArray()
            );
        }
        foreach (Menu::all() as $menu) {
            $menu->menuItems()->createMany(
                MenuItem::factory(10)->make()->toArray()
            );
        }
    }
}
