<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function request()
    {
        return $this->hasOne(Peminjaman::class);
    }

    protected $table = 'ruang_lab';
}
