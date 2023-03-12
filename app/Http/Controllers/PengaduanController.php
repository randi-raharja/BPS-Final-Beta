<?php

namespace App\Http\Controllers;

use App\constants\Permissions;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        $now = Carbon::now();
        $satu = $now->isoFormat('MMMM');
        $now2 = Carbon::now()->subMonth(1);
        $dua = $now2->isoFormat('MMMM');
        $now3 = Carbon::now()->subMonth(2);
        $tiga = $now3->isoFormat('MMMM');

        $bulan1 = Pengaduan::query()->whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->count();
        $bulan2 = Pengaduan::query()->whereMonth('created_at', $now2->month)->whereYear('created_at', $now2->year)->count();
        $bulan3 = Pengaduan::query()->whereMonth('created_at', $now3->month)->whereYear('created_at', $now3->year)->count();

        $kate1 = Pengaduan::query()->where('category_id', 1)->count();
        $kate2 = Pengaduan::query()->where('category_id', 2)->count();
        $kate3 = Pengaduan::query()->where('category_id', 3)->count();
        $kate4 = Pengaduan::query()->where('category_id', 4)->count();
        $kate5 = Pengaduan::query()->where('category_id', 5)->count();

        $data = [
            'pengaduan' => $pengaduan,
            'satu' => $satu,
            'dua' => $dua,
            'tiga' => $tiga,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'bulan3' => $bulan3,
            'kate1' => $kate1,
            'kate2' => $kate2,
            'kate3' => $kate3,
            'kate4' => $kate4,
            'kate5' => $kate5,
        ];
        return view('Laporan.Index', $data);
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
        $answer = Answer::all();

        return view('Laporan.Answer', compact('pengaduan', 'answer'));
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

        // Kirim Pesan via Zenziva
        $userkey = '3abc2c7f1266';
        $passkey = 'bb34c138714939bf870de038';
        $telepon = $pengaduan->user->no_hp;
        $message = 'TERIMA KASIH ATAS LAPORAN ANDA DAN LAPORAN ANDA SUDAH KAMI TINDAK LANJUTI SILAHKAN KEMBALI CHECK HALAMAN LAPORAN ANDA. DEMI MENINGKATKAN PELAYAN KAMI TERHADAP MASYARAKAT, KAMI MOHON UNTUK MENGISIKAN DATA PADA LINK BERIKUT INI : http://127.0.0.1:8000/feedback ';
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);

        return to_route('pengaduan.index')->with('status', 'Tanggapan berhasil diinputkan, terima kasih atas kerjasamanya');
    }

    public function view($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('Laporan.AfterAnswer', compact('pengaduan'));
    }
}
