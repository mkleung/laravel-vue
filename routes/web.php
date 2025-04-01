<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    sleep(.5);
    return Inertia::render('Home');
})->name('home');  // this uses the ziggy named routes


Route::inertia('/about','About')->name('about');
