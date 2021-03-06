<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use Notifiable;
    protected $guarded = ['id'];
    public function room()
    {
        return $this->belongsTo(Room::class, 'ruang_lab_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'status_id');
    }

    protected $table = 'surat_peminjaman_lab';
}
