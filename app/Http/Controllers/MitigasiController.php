<?php

namespace App\Http\Controllers;

use App\constants\Permissions;
use App\Models\Fungsi;
use App\Models\Mitigasi;
use App\Models\Sumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MitigasiController extends Controller
{
    public function index()
    {
        if (!Gate::allows(Permissions::READ_MITIGASI)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $mitigasis = Mitigasi::all();
        return view('Mitigasi.index', compact('mitigasis'));
    }

    public function create()
    {
        if (!Gate::allows(Permissions::CREATE_MITIGASI)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $fungsis = Fungsi::all();
        $sumbers = Sumber::all();
        return view('Mitigasi.Add', compact('fungsis', 'sumbers'));
    }

    public function store(Request $request)
    {
        if (!Gate::allows(Permissions::CREATE_MITIGASI)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $request->validate([
            'fungsi_id' => ['required'],
            'kegiatan' => ['required'],
            'risk' => ['required'],
            'sebab' => ['required'],
            'sumber_id' => ['required'],
            'solusi' => ['required'],
        ]);

        Mitigasi::create([
            'user_id' => auth()->id(),
            'fungsi_id' => $request->fungsi_id,
            'kegiatan' => $request->kegiatan,
            'risk' => $request->risk,
            'sebab' => $request->sebab,
            'sumber_id' => $request->sumber_id,
            'solusi' => $request->solusi,
        ]);

        return to_route('mitigasi.index')->with('status', 'Data mitigasi berhasil diinput. Silahkan tunggu verifikasi');
    }

    public function edit(Request $request, $id)
    {
        if (!Gate::allows(Permissions::UPDATE_MITIGASI)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $fungsis = Fungsi::all();
        $sumbers = Sumber::all();
        $mitigasi = Mitigasi::findOrFail($id);

        return view('Mitigasi.Edit', compact('fungsis', 'sumbers', 'mitigasi'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows(Permissions::UPDATE_MITIGASI)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $validated = $request->validate([
            'fungsi_id' => ['required'],
            'kegiatan' => ['required'],
            'risk' => ['required'],
            'sebab' => ['required'],
            'sumber_id' => ['required'],
            'solusi' => ['required'],
        ]);

        Mitigasi::where('id', $id)->update($validated);

        return to_route('mitigasi.index')->with('status', 'Mitigasi Updated');
    }

    public function destroy($id)
    {
        if (!Gate::allows(Permissions::DELETE_MITIGASI)) {
            return abort(403, 'RESTRICTED AREA');
        }
        Mitigasi::where('id', $id)->delete();

        return to_route('mitigasi.index')->with('delete', 'Data Deleted');
    }

    public function verif_index()
    {
        if (!Gate::allows(Permissions::UPDATE_VERIFIKASI)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $mitigasis = Mitigasi::where('is_verif', false)->get();
        return view('Mitigasi.Data', compact('mitigasis'));
    }

    public function verif($id)
    {
        if (!Gate::allows(Permissions::UPDATE_VERIFIKASI)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $mitigasi = Mitigasi::find($id);

        $mitigasi->is_verif = true;

        $mitigasi->verif_by = auth()->id();

        $mitigasi->save();

        return to_route('mitigasi.verif_index')->with('status', 'Data berhasil diverifikasi.W');
    }

    public function print($id)
    {
        if (!Gate::allows(Permissions::PRINT_MITIGASI)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $mitigasi = Mitigasi::findOrFail($id);
        return view('Mitigasi.Print', compact('mitigasi'));
    }
}
