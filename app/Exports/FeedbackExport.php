<?php

namespace App\Exports;

use App\Models\Feedback;
use Maatwebsite\Excel\Concerns\FromCollection;

class FeedbackExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Feedback::all();
    }
}
