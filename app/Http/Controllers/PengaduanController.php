<?php

namespace App\Http\Controllers;

use App\constants\Permissions;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();
        if (!Gate::allows(Permissions::UPDATE_ANSWER)) {
            $pengaduan = Pengaduan::where('user_id', auth()->id())->get();
        }
        return view('Laporan.Index', compact('pengaduan'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Laporan.Add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'category_id' => ['required'],
            'isi' => ['required']
        ]);

        Pengaduan::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'isi' => $request->isi,
            'no_ticket' => Str::upper(Str::random(16)),
        ]);

        return to_route('pengaduan.index')->with('status', 'Laporan anda kami terima, terima kasih atas masukannya');
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('Laporan.Answer', compact('pengaduan'));
    }

    public function answer(Request $request, $id)
    {
        if (!Gate::allows(Permissions::UPDATE_ANSWER)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $pengaduan = Pengaduan::findOrFail($id);
        
        $request->validate([
            'answer' => ['required']
        ]);
        
        Answer::create([
            'pengaduan_id' => $pengaduan->id,
            'answer' => $request->answer,
            'user_id' => auth()->id(),
        ]);
        
        return to_route('pengaduan.index')->with('status', 'Tanggapan berhasil diinputkan, terima kasih atas kerjasamanya');
    }
    
    public function view($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        return view('Laporan.AfterAnswer', compact('pengaduan'));
    }
}
