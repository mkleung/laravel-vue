<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        
        sleep(1);

        // Validate fields
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        // Register a user
        $user = User::create($fields);

        // Login User
        Auth::login($user);

        // Redirect
        return redirect()->route('home');

    }
}
