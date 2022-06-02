<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $guarded = [];

    public function request()
    {
        return $this->belongsTo(Peminjaman::class);
    }

    protected $table = 'status_aktivasi';
}
