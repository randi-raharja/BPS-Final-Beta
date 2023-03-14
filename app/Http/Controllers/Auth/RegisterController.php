<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $title = 'BPS Banjarmasin | Register';
        return view('Auth.Register', compact('title'));
    }

    public function store(Request $request)
    {
        $role = Role::where('name', 'pelapor')->first();
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8', 'max:30', Rules\Password::defaults()],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'wa' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'wa' => $request->wa,
            'role_id' => $role->id,
        ]);

        event(new Registered($user));

        auth()->login($user);

        return to_route('verification.notice')->with('status', 'Akun terdaftar, silahkan login!');
    }
}
