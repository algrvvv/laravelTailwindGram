<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Bye!');
    }

    public function index()
    {
        return view('login.log');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $attrs = $request->only('username', 'password');

        // Auth::attempt($attrs)
        // auth('admin')->attempt($attrs)
        if(auth('web')->attempt($attrs)){
            return redirect()->route('home')->with('success', 'Welcome back!');
        }

        return redirect()->route('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function profile(){
        return Auth::id();
        // return request()->cookie('laravel_session');
    }
}
