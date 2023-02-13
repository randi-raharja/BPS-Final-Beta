<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fungsi extends Model
{
    use HasFactory;

    public function mitigasis()
    {
        return $this->hasMany(Mitigasi::class, 'fungsi_id');
    }
}
