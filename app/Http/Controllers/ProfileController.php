<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
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

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required|max:8',
            'phone' => 'required|max:12|integer',
            'prodi' => 'required',
            'angkatan' => 'required|max:4|integer'
        ]);

        Mahasiswa::where('id', '=', $request->user_id)->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'angkatan' => $request->angkatan
        ]);

        User::where('id' , '=', $request->user_id)->update([
            'phone' => $request->phone
        ]);

        return redirect('/dashboard');
    }
}
