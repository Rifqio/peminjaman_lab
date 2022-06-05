<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function daftar_peminjam()
    {
        $peminjam = DB::table("surat_peminjaman_lab")
            ->join("users", function ($join) {
                $join->on("surat_peminjaman_lab.user_id", "=", "users.id");
            })
            ->join("ruang_lab", function ($join) {
                $join->on("surat_peminjaman_lab.ruang_lab_id", "=", "ruang_lab.id");
            })
            ->select("ruang_lab.nama_ruang", "surat_peminjaman_lab.keterangan", "surat_peminjaman_lab.tanggal_awal_peminjaman", "users.name", "users.email", "surat_peminjaman_lab.id")
            ->where("surat_peminjaman_lab.status_id", "=", 1)
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
        $approve =  Crypt::decrypt($request->status_id);
        $data =  Crypt::decrypt($request->id);
        Peminjaman::where('id', $data)->update(['status_id' => $approve]);
        return redirect('/daftar-peminjam');
    }

    public function disapprove(Request $request)
    {
        $approve =  Crypt::decrypt($request->status_id);
        $data =  Crypt::decrypt($request->id);
        Peminjaman::where('id', $data)->update(['status_id' => $approve]);
        return redirect('/dashboard');
    }



}
