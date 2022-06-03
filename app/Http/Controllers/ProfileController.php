<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        return view(
            'profile.index',
            [
                'prodi' => $prodi,
            ]
        );
    }

    public function update()
    {
        
    }
}
