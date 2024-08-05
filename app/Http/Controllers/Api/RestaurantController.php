<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::withCount('menus')->get();

        // Transform the collection to include menuCount key
        $restaurants = $restaurants->map(function ($restaurant) {
            return [
                'id' => $restaurant->id,
                'name' => $restaurant->name,
                'address' => $restaurant->address,
                'phone_number' => $restaurant->phone_number,
                'city' => $restaurant->city,
                'description' => $restaurant->description,
                'logo' => $restaurant->logo,
                'menuCount' => $restaurant->menus->count(), // Add the menu count
            ];
        });

        return response()->json(['restaurants' => $restaurants]);
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('menus')->find($id);
        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }
        return response()->json(['restaurant' => $restaurant]);
    }
}
