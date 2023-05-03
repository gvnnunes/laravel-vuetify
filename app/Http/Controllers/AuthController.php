<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return Inertia::render('Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $request->get('rememberMe'))) {
            if (!Auth::user()->ativo) {
                Auth::logout();
                return redirect()->back()->withErrors(['erro' => __('auth.blocked')]);
            }

            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors(['erro' => __('auth.failed')]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function revalidarCsrfToken()
    {
        return response()->json([
            'message' => 'O token foi revalidado e a expiração da sessão foi estendida.'
        ]);
    }
}
