<?php

namespace App\Http\Controllers;

use App\Exports\FeedbackExport;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::paginate();
        return view('IKM.index', compact('feedbacks'));
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
        return Excel::download(new FeedbackExport, date('Y-m-d').'-Feedback.xlsx');
    }
}
