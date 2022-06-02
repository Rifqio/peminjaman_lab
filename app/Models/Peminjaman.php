<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'tanggal_awal_peminjaman',
        'tanggal_akhir_peminjaman',
        'status_id',
        'keterangan'
    ];
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'status_id');
    }

    protected $table = 'peminjaman';
}
