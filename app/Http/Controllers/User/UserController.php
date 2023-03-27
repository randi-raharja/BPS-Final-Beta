<?php

namespace App\Http\Controllers\User;

use App\constants\Permissions;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        if (!Gate::allows(Permissions::READ_USER)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $users = User::paginate();
        return view('User.Index', compact('users'));
    }

    public function create()
    {
        if (!Gate::allows(Permissions::CREATE_USER)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $roles = Role::all();
        return view('User.Add', compact('roles'));
    }

    public function store(Request $request)
    {
        if (!Gate::allows(Permissions::CREATE_USER)) {
            return abort(403, 'RESTRICTED AREA');
        }
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
        if (!Gate::allows(Permissions::DELETE_USER)) {
            return abort(403, 'RESTRICTED AREA');
        }
        User::where('id', $id)->delete();

        return to_route('users.index')->with('delete', 'User Deleted');
    }

    public function edit($id)
    {
        if (!Gate::allows(Permissions::UPDATE_USER)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $roles = Role::all();
        $user = User::findOrFail($id);

        return view('User.Edit', compact('roles', 'user'));
    }

    public function update(Request $request,  $id)
    {
        if (!Gate::allows(Permissions::UPDATE_USER)) {
            return abort(403, 'RESTRICTED AREA');
        }
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

    public function export()
    {
        if (!Gate::allows(Permissions::EXPORT_IKM)) {
            return abort(403, 'RESTRICTED AREA');
        }
        return Excel::download(new UsersExport, date('Y-m-d') . '-Pegawai.xlsx');
    }
}
