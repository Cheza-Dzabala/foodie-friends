<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/restaurant', [RestaurantController::class, 'index'])->name('restaurant');
    Route::get('/restaurant/create', [RestaurantController::class, 'create'])->name('restaurant.create');
});
