<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify()
    {
        $title = 'Check your email';
        return view('Auth.Verif', compact('title'));
    }

    public function emailverif(EmailVerificationRequest $emailVerificationRequest)
    {
        $emailVerificationRequest->fulfill();

        return to_route('dashboard');
    }
}
