<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function daftar_peminjam()
    {
        $peminjam = DB::table("peminjaman")
            ->join("users", function ($join) {
                $join->on("peminjaman.user_id", "=", "users.id");
            })
            ->join("rooms", function ($join) {
                $join->on("peminjaman.room_id", "=", "rooms.id");
            })
            ->select("rooms.nama_ruang", "peminjaman.keterangan", "peminjaman.tanggal_awal_peminjaman", "users.name", "users.email", "peminjaman.id")
            ->get();
        return view(
            'admin.dashboard.daftar-peminjam',
            [
                'peminjam' => $peminjam
            ]
        );
    }

    public function approve(Request $request)
    {
        Peminjaman::where('id', $request->id)->update(['status_id' => 2]);
        return redirect('/dashboard');
    }

    public function disapprove(Request $request)
    {
        Peminjaman::where('id', $request->id)->update(['status_id' => 3]);
        return redirect('/dashboard');
    }



}
