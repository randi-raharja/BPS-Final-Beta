<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $title = 'BPS Banjarmasin | Login';
        return view('Auth.Login', compact('title'));
    }

    public function auth(Request $request)
    {
        $credit = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credit)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        } else {
            return back()->with('loginError', 'Check your email or password!');
        }
    }
}
