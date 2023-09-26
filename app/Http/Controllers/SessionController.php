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

        if(Auth::attempt($attrs)){
            return redirect()->route('home')->with('success', 'Welcome back!');
        }

        return redirect()->route('login');
    }

    public function profile(){
        return request()->cookie('laravel_session');
    }
}
