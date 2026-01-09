<?php

namespace App\Http\Controllers;

use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function singin()
    {
        return view('auth.login');
    }
    public function singup()
    {
        return view('auth.register');
    }

    public function auth(request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            ToastMagic::success('Login successful.');
            if (Auth::user()->role === 'mahasiswa') {
                return redirect()->intended('/');
            } else {
                return redirect()->intended('/admin/users');
            }

        }


        ToastMagic::error('Email or password is incorrect.');
        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ])->onlyInput('email');
    }

    public function register(request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'mahasiswa',
        ]);


        ToastMagic::success('Registration successful. Please login.');
        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }
    public function logout(request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        ToastMagic::success('Logout successful.');

        return redirect('/');
    }

}


