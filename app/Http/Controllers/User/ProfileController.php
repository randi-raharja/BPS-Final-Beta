<?php

namespace App\Http\Controllers\User;

use App\constants\Permissions;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('Profile.Index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Profile.Edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name' => ['required'],
            'no_hp' => ['required'],
            'alamat' => ['required'],
        ];
        if (!Gate::allows(Permissions::UPDATE_NIDN)) {
            $rules['nidn'] = ['required'];
            $rules['ttd'] = ['required', 'image', 'max:1024'];
        }

        $validate = $request->validate($rules);
        $path = NULL;
        if ($request->has('ttd')) {
            $path = $request->file('ttd')->store('image/ttd');
        }
        $user->forceFill([
            'name' => $validate['name'],
            'no_hp' => $validate['no_hp'],
            'alamat' => $validate['alamat'],
            'nidn' => $validate['nidn'],
            'ttd' => $path,
        ])->save();

        return to_route('profile.index')->with('status', 'Profile Updated');
    }
}
