<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.log');
    }

    public function login(Request $request)
    {
        $attrs = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $attrs = $request->only('username', 'password');

        if (auth('admin')->attempt($attrs)) {
            return redirect()->route('admin.home')->with('success', 'Welcome back!');
        }

        return redirect()->route('admin.login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout(){
        auth('admin')->logout();
        return redirect()->route('home')->with('success', 'Bye!');
    }
}
