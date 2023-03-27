<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    // use Exportable;

    public function view(): View
    {
        return view('User.export', [
            'users' => User::query()->whereNot('role_id', 1)->get()
        ]);
    }
}
