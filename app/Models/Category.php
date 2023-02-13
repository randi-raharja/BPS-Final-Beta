<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class, 'category_id');
    }
}
