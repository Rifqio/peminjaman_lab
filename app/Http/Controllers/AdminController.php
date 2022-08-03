<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    /**
     *
     * Daftar Peminjaman Lab
     *
     */

    public function daftar_peminjam()
    {
        $peminjam = DB::table("surat_peminjaman_lab")
            ->join("users", function ($join) {
                $join->on("surat_peminjaman_lab.user_id", "=", "users.id");
            })
            ->join("ruang_lab", function ($join) {
                $join->on("surat_peminjaman_lab.ruang_lab_id", "=", "ruang_lab.id");
            })
            ->select("ruang_lab.nama_ruang", "surat_peminjaman_lab.tujuan_akses_id", "surat_peminjaman_lab.tanggal_awal_peminjaman", "users.name", "users.email", "surat_peminjaman_lab.id")
            ->orderBy("surat_peminjaman_lab.tanggal_awal_peminjaman", 'desc')
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

    public function cekPermohonan($id)
    {
        $data = DB::table("surat_peminjaman_lab")
        ->join("users", function ($join) {
            $join->on("surat_peminjaman_lab.user_id", "=", "users.id");
        })
        ->join("status_aktivasi", function ($join) {
            $join->on("surat_peminjaman_lab.status_id", "=", "status_aktivasi.id");
        })
        ->join("ruang_lab", function ($join) {
            $join->on("surat_peminjaman_lab.ruang_lab_id", "=", "ruang_lab.id");
        })
        ->join("user_mahasiswa", function ($join) {
            $join->on("users.id", "=", "user_mahasiswa.user_id");
        })
        ->join("prodi", function ($join) {
            $join->on("user_mahasiswa.prodi_id", "=", "prodi.id");
        })
        ->select("users.name", "user_mahasiswa.nim", "users.email", "prodi.nama_prodi", "user_mahasiswa.alamat", "user_mahasiswa.phone", "surat_peminjaman_lab.tujuan_akses_id", "surat_peminjaman_lab.judul_penelitian", "ruang_lab.nama_ruang", "surat_peminjaman_lab.no_surat")
        ->where("surat_peminjaman_lab.id", "=", $id)
        ->get();

    $pdf = PDF::loadView('student.peminjaman.form.cetak.permohonan', ['data' => $data]);
    return $pdf->stream();
    }

    /**
     *
     * Daftar Uji Lab
     *
     */
    public function daftar_uji()
    {
        $relation = DB::table("pembayaran")
        ->join("status_pembayaran", "pembayaran.status_pembayaran", "=", "status_pembayaran.id")
        ->join("surat_data_uji_sampel", "surat_data_uji_sampel.id", "=", "pembayaran.uji_sampel_id")
        ->select("pembayaran.url_bukti_pembayaran","surat_data_uji_sampel.id","surat_data_uji_sampel.no_surat", "surat_data_uji_sampel.no_pembayaran", "surat_data_uji_sampel.nama_sampel", "status_pembayaran.status", "surat_data_uji_sampel.tanggal_masuk", "surat_data_uji_sampel.tanggal_selesai")
        ->where("surat_data_uji_sampel.user_id", "=", Auth::user()->id)
        ->get();
        return view('admin.dashboard.daftar-uji');
    }

}
