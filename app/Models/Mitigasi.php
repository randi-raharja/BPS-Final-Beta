<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitigasi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'is_verif' => 'boolean',
    ];

    public function fungsi()
    {
        return $this->belongsTo(Fungsi::class, 'fungsi_id');
    }

    public function sumber()
    {
        return $this->belongsTo(Sumber::class, 'sumber_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verif_by_user()
    {
        return $this->belongsTo(User::class, 'verif_by');
    }
}
