<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class IKMController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('IKM.index', compact('feedbacks'));
    }

    public function form()
    {
        return 'ini form';
    }

    public function store(Request $request)
    {
        return 'anjay';
    }
}
