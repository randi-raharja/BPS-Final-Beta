<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.Login');
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
        }
    }
}
