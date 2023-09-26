<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.reg');
    }

    public function store(){
        $attributes = request()->validate([
            'username' => ['required', 'alpha', 'max:255', 'unique:users,username'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'alpha', 'max:255', 'min:8', 'max:255']
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Your account has been created!');
    }
}
