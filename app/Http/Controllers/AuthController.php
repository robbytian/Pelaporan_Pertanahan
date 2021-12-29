<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('username', $credentials['username'])->where('password', $credentials['password'])->first();

        if ($user != null) {
            Auth::login($user);
            return redirect()->intended('dashboard');
        }

        return back()->with([
            'error' => 'Username atau Password salah!',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
