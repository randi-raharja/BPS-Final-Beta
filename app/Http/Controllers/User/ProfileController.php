<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function update(Request $request)
    {
    }
}
