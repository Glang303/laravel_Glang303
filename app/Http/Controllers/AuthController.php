<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //form register
    public function showRegisterForm()
    {
        return view('auth.register'); 
    }

    // Proses regis
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', 
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    //form login
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    // Proses log in
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard'); 
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
