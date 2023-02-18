<?php

namespace App\Http\Controllers;

use App\constants\Permissions;
use App\Models\Fungsi;
use App\Models\Mitigasi;
use App\Models\Sumber;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class MitigasiController extends Controller
{
    public function index()
    {
        $mitigasis = Mitigasi::all();
        $fungsi = Fungsi::all();
        if (!Gate::allows(Permissions::UPDATE_VERIFIKASI)) {
            $mitigasis = Mitigasi::where('user_id', auth()->id())->get();
        }

        $fungsi1 = Mitigasi::query()->where('fungsi_id', 1)->count();
        $fungsi2 = Mitigasi::query()->where('fungsi_id', 2)->count();
        $fungsi3 = Mitigasi::query()->where('fungsi_id', 3)->count();
        $fungsi4 = Mitigasi::query()->where('fungsi_id', 4)->count();
        $fungsi5 = Mitigasi::query()->where('fungsi_id', 5)->count();
        $fungsi6 = Mitigasi::query()->where('fungsi_id', 6)->count();

        $verif_on = Mitigasi::query()->where('is_verif', true)->count();
        $verif_off = Mitigasi::query()->where('is_verif', false)->count();

        $now = Carbon::now();
        $satu = $now->isoFormat('MMMM');
        $now2 = Carbon::now()->subMonth(1);
        $dua = $now2->isoFormat('MMMM');
        $now3 = Carbon::now()->subMonth(2);
        $tiga = $now3->isoFormat('MMMM');
        $now4 = Carbon::now()->subMonth(3);
        $empat = $now4->isoFormat('MMMM');
        $now5 = Carbon::now()->subMonth(4);
        $lima = $now5->isoFormat('MMMM');
        $now6 = Carbon::now()->subMonth(5);
        $enam = $now6->isoFormat('MMMM');
        $now7 = Carbon::now()->subMonth(6);
        $tujuh = $now7->isoFormat('MMMM');
        $now8 = Carbon::now()->subMonth(7);
        $delapan = $now8->isoFormat('MMMM');
        $now9 = Carbon::now()->subMonth(8);
        $sembilan = $now9->isoFormat('MMMM');
        $now10 = Carbon::now()->subMonth(9);
        $sepuluh = $now10->isoFormat('MMMM');
        $now11 = Carbon::now()->subMonth(10);
        $sebelas = $now11->isoFormat('MMMM');
        $now12 = Carbon::now()->subMonth(11);
        $duabelas = $now12->isoFormat('MMMM');

        $bulan1 = Mitigasi::query()->whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->count();
        $bulan2 = Mitigasi::query()->whereMonth('created_at', $now2->month)->whereYear('created_at', $now2->year)->count();
        $bulan3 = Mitigasi::query()->whereMonth('created_at', $now3->month)->whereYear('created_at', $now3->year)->count();
        $bulan4 = Mitigasi::query()->whereMonth('created_at', $now4->month)->whereYear('created_at', $now4->year)->count();
        $bulan5 = Mitigasi::query()->whereMonth('created_at', $now5->month)->whereYear('created_at', $now5->year)->count();
        $bulan6 = Mitigasi::query()->whereMonth('created_at', $now6->month)->whereYear('created_at', $now6->year)->count();
        $bulan7 = Mitigasi::query()->whereMonth('created_at', $now7->month)->whereYear('created_at', $now7->year)->count();
        $bulan8 = Mitigasi::query()->whereMonth('created_at', $now8->month)->whereYear('created_at', $now8->year)->count();
        $bulan9 = Mitigasi::query()->whereMonth('created_at', $now9->month)->whereYear('created_at', $now9->year)->count();
        $bulan10 = Mitigasi::query()->whereMonth('created_at', $now10->month)->whereYear('created_at', $now10->year)->count();
        $bulan11 = Mitigasi::query()->whereMonth('created_at', $now11->month)->whereYear('created_at', $now11->year)->count();
        $bulan12 = Mitigasi::query()->whereMonth('created_at', $now12->month)->whereYear('created_at', $now12->year)->count();

        $data = [
            'mitigasis' => $mitigasis,
            'fungsi1' => $fungsi1,
            'fungsi2' => $fungsi2,
            'fungsi3' => $fungsi3,
            'fungsi4' => $fungsi4,
            'fungsi5' => $fungsi5,
            'fungsi6' => $fungsi6,
            'verif_on' => $verif_on,
            'verif_off' => $verif_off,
            'satu' => $satu,
            'dua' => $dua,
            'tiga' => $tiga,
            'empat' => $empat,
            'lima' => $lima,
            'enam' => $enam,
            'tujuh' => $tujuh,
            'delapan' => $delapan,
            'sembilan' => $sembilan,
            'sepuluh' => $sepuluh,
            'sebelas' => $sebelas,
            'duabelas' => $duabelas,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'bulan3' => $bulan3,
            'bulan4' => $bulan4,
            'bulan5' => $bulan5,
            'bulan6' => $bulan6,
            'bulan7' => $bulan7,
            'bulan8' => $bulan8,
            'bulan9' => $bulan9,
            'bulan10' => $bulan10,
            'bulan11' => $bulan11,
            'bulan12' => $bulan12,
            'now' => $now,
            'now2' => $now2,
            'now3' => $now3,
            'fungsi' => $fungsi,
        ];
        // return $data;
        return view('Mitigasi.index', $data);
    }

    public function view($id)
    {
        $mitigasi = Mitigasi::findOrFail($id);
        $fungsis = Fungsi::all();
        $sumbers = Sumber::all();

        return view('Mitigasi.View', compact('mitigasi', 'fungsis', 'sumbers'));
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

        return to_route('mitigasi.verif_index')->with('status', 'Data berhasil diverifikasi');
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
