<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Inertia\Inertia;


// Route::get('/', function () {
//     sleep(.5);
//     return Inertia::render('Home');
// })->name('home');  

Route::inertia('/', 'Home', ['users' => User::paginate(5)])->name('home');

Route::inertia('/about', 'About')->name('about');

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);

});


