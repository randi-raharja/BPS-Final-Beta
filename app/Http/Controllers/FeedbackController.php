<?php

namespace App\Http\Controllers;

use App\constants\Permissions;
use App\Exports\FeedbackExport;
use App\Models\Feedback;
use Illuminate\Http\Request;
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
        if (!Gate::allows(Permissions::EXPORT_IKM)) {
            return abort(403, 'RESTRICTED AREA');
        }
        return Excel::download(new FeedbackExport, date('Y-m-d').'-Feedback.xlsx');
    }
}
