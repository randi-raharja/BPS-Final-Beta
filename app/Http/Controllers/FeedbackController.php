<?php

namespace App\Http\Controllers;

use App\constants\Permissions;
use App\Exports\FeedbackExport;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class FeedbackController extends Controller
{
    public function index()
    {
        if (!Gate::allows(Permissions::READ_IKM)) {
            return abort(403, 'RESTRICTED AREA');
        }
        $feedbacks = Feedback::paginate();
        $rating1 = Feedback::query()->where('rating', 1)->count();
        $rating2 = Feedback::query()->where('rating', 2)->count();
        $rating3 = Feedback::query()->where('rating', 3)->count();
        $rating4 = Feedback::query()->where('rating', 4)->count();
        $rating5 = Feedback::query()->where('rating', 5)->count();

        $now = Carbon::now();
        $pertama = $now->isoFormat('MMMM');
        $now2 = Carbon::now()->subMonth(1);
        $kedua = $now2->isoFormat('MMMM');
        $now3 = Carbon::now()->subMonth(2);
        $ketiga = $now3->isoFormat('MMMM');

        $bulan1 = Feedback::query()->whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->count();
        $bulan2 = Feedback::query()->whereMonth('created_at', $now2->month)->whereYear('created_at', $now2->year)->count();
        $bulan3 = Feedback::query()->whereMonth('created_at', $now3->month)->whereYear('created_at', $now3->year)->count();

        // $bulan1 = Feedback::query()->where([
        //     ['created_at', '>=', $now2],
        //     ['created_at', '<=', $now],
        // ])->count();
        // $bulan2 = Feedback::query()->where([
        //     ['created_at', '>=', $now3],
        //     ['created_at', '<=', $now2],
        // ])->count();
        // $bulan3 = Feedback::query()->where([
        //     ['created_at', '>=', $now->subMonth(4)],
        //     ['created_at', '<=', $now3],
        // ])->count();

        $data = [
            'feedbacks' => $feedbacks,
            'rating1' => $rating1,
            'rating2' => $rating2,
            'rating3' => $rating3,
            'rating4' => $rating4,
            'rating5' => $rating5,
            'pertama' => $pertama,
            'kedua' => $kedua,
            'ketiga' => $ketiga,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'bulan3' => $bulan3,
            'now' => $now,
            'now2' => $now2,
            'now3' => $now3,
        ];
        return view('IKM.index', $data);
    }

    public function form()
    {
        return view('IKM.Form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kritik' => ['required'],
            'saran' => ['required'],
            'rating' => ['required']
        ]);

        Feedback::create([
            'rating' => $request->rating,
            'saran' => $request->saran,
            'kritik' => $request->kritik,
        ]);

        return back()->with('status', 'Terima Kasih atas kerjasamanya');
    }

    public function export()
    {
        if (!Gate::allows(Permissions::EXPORT_IKM)) {
            return abort(403, 'RESTRICTED AREA');
        }
        return Excel::download(new FeedbackExport, date('Y-m-d') . '-Feedback.xlsx');
    }
}
