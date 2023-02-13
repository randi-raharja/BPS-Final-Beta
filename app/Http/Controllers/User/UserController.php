<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('User.Index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('User.Add', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8', 'max:30', Rules\Password::defaults()],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'role_id' => ['required']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'role_id' => $request->role_id,
        ]);
        return to_route('users.index')->with('status', 'User berhasil ditambahkan');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return to_route('users.index')->with('delete', 'User Deleted');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);

        return view('User.Edit', compact('roles', 'user'));
    }

    public function update(Request $request,  $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns', Rule::unique('users', 'email')->ignore($user->id)],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'role_id' => ['required']
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->role_id = $request->role_id;

        $user->save();

        return to_route('users.index')->with('status', 'User updated');
    }
}
