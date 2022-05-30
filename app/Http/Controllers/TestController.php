<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $ruangan = Room::all();
        return view('peminjaman.form.create.index', [
            'ruangan' => $ruangan,
        ]);
    }
    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'ruangan' => 'required',
        //     'tanggal_awal_peminjaman' => 'required',
        //     'tanggal_akhir_peminjaman' => 'required',
        // ]);
        $tanggal_awal = $request->tanggal_awal_peminjaman = date('Y-m-d', strtotime($request->tanggal_awal_peminjaman));
        $tanggal_akhir = $request->tanggal_akhir_peminjaman = date('Y-m-d', strtotime($request->tanggal_akhir_peminjaman));
        // dd($request);
        Peminjaman::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id_,
            'tanggal_awal_peminjaman' => $tanggal_awal,
            'tanggal_akhir_peminjaman' => $tanggal_akhir,
            'status_id' => $request->status_id,
        ]);
        return redirect('/dashboard')->with('success', 'Post has been created');

    }
}
