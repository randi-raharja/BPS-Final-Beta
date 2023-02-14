<?php

namespace App\Http\Controllers\User;

use App\constants\Permissions;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        if (!Gate::allows(Permissions::READ_ROLE)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $roles = Role::all();
        return view('Role.Index', compact('roles'));
    }

    public function create()
    {
        if (!Gate::allows(Permissions::CREATE_ROLE)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $permissions = Permission::all();
        return view('Role.Add', compact('permissions'));
    }

    public function store(Request $request)
    {
        if (!Gate::allows(Permissions::CREATE_ROLE)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $validate = $request->validate([
            'name' => ['required'],
            'desc' => ['required'],
            'permission_id' => ['required', 'array']
        ]);

        try {
            DB::beginTransaction();
            $credit = Role::create([
                'name' => $request->name,
                'desc' => $request->desc
            ]);
            $credit->permissions()->sync($validate['permission_id']);
            DB::commit();
            return to_route('users.role.index')->with('status', 'Role berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function destroy($id)
    {
        if (!Gate::allows(Permissions::DELETE_ROLE)) {
            return abort(403, 'RESTRICTED AREA');
        }
        Role::where('id', $id)->delete();

        return to_route('users.role.index')->with('delete', 'Role Deleted');
    }

    public function edit($id)
    {
        if (!Gate::allows(Permissions::UPDATE_ROLE)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $permissions = Permission::all();
        $role = Role::findOrFail($id);
        return view('Role.Edit', compact('permissions', 'role'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows(Permissions::UPDATE_ROLE)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $role = Role::findOrFail($id);
        $validate = $request->validate([
            'name' => ['required'],
            'desc' => ['required'],
            'permission_id' => ['required', 'array']
        ]);

        try {
            DB::beginTransaction();
            $role->name = $validate['name'];
            $role->desc = $validate['desc'];
            $role->permissions()->sync($validate['permission_id']);

            $role->save();
            DB::commit();
            return to_route('users.role.index')->with('status', 'Role updated');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
