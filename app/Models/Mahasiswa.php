<?php

namespace App\Models;

use App\Models\User;
use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    public $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prodi()
    {
        return $this->hasOne(Prodi::class. 'prodi_id');
    }

    public function bebas_lab()
    {
        return $this->hasOne(BebasLab::class);
    }


    protected $table = 'user_mahasiswa';
}
