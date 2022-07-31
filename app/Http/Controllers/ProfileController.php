<?php

namespace App\Http\Controllers;

use App\Models\Guest;
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
        if (Auth::user()->hasRole('student'))
        {
            $prodi = Prodi::all();
            return view('student.profile.index',['prodi' => $prodi, ]);
        }
        elseif (Auth::user()->hasRole('guest'))
        {
            return view('guest.profile.index');
        }
    }

    public function update(Request $request)
    {
        if (Auth::user()->hasRole('student'))
        {
            $request->validate([
                'name' => 'required',
                'nim' => 'required|max:8',
                'prodi_id' => 'required',
                'angkatan' => 'required|max:4|min:4',
                'phone' => 'required|max:12',
            ]);

            // dd($request);

            $phone = $request->phone;
            $intPhone = (int)$phone;
            $angkatan = $request->angkatan;
            $intAngkatan = (int)$angkatan;

            Mahasiswa::where('user_id', auth()->user()->id)->update([
                'nim' => $request->nim,
                'prodi_id' => $request->prodi_id,
                'angkatan' => $intAngkatan,
                'phone' => "0" . $intPhone,
            ]);

            User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
            ]);

            return redirect('/dashboard');
        }
        elseif (Auth::user()->hasRole('guest'))
        {
            $request->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);

            Guest::where('user_id', auth()->user()->id)->update([
                'phone' => $request->phone
            ]);

            User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
            ]);
            
            return redirect('/dashboard');
        }

    }
}
