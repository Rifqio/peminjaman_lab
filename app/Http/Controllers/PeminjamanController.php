<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\SumberDana;
use App\Models\TujuanAkses;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\CreatePeminjaman;
use App\Http\Requests\PeminjamanRequest;
use Illuminate\Support\Facades\Notification;

class PeminjamanController extends Controller
{
    public function index()
    {
        if (Auth::user()->mahasiswa->nim === null) {
            return redirect('/dashboard')->with('warning', 'Mohon untuk melengkapi profil sebelum melakukan peminjaman');
        }
        return view('peminjaman.home.index');
    }

    public function status_peminjaman()
    {
        $data =
            DB::table("surat_peminjaman_lab")
            ->join("status_aktivasi", function ($join) {
                $join->on("surat_peminjaman_lab.status_id", "=", "status_aktivasi.id");
            })
            ->join("ruang_lab", function ($join) {
                $join->on("surat_peminjaman_lab.ruang_lab_id", "=", "ruang_lab.id");
            })
            ->join("users", function ($join) {
                $join->on("surat_peminjaman_lab.user_id", "=", "users.id");
            })
            ->select("surat_peminjaman_lab.id", "surat_peminjaman_lab.no_surat", "surat_peminjaman_lab.keterangan", "ruang_lab.nama_ruang", "surat_peminjaman_lab.created_at", "surat_peminjaman_lab.updated_at", "surat_peminjaman_lab.status_id", "status_aktivasi.status", "surat_peminjaman_lab.tanggal_awal_peminjaman", "surat_peminjaman_lab.tanggal_akhir_peminjaman")
            ->where("users.id", "=", Auth::id())
            ->orderBy("surat_peminjaman_lab.tanggal_awal_peminjaman", 'desc')
            ->get();
        return view('peminjaman.form.status.index', [
            'data' => $data,
            // 'pemin>onjaman' => $peminjaman,
        ]);
    }

    public function create()
    {
        $prodi =
            DB::table("users")
            ->join("user_mahasiswa", function ($join) {
                $join->on("users.id", "=", "user_mahasiswa.user_id");
            })
            ->join("prodi", function ($join) {
                $join->on("user_mahasiswa.prodi_id", "=", "prodi.id");
            })
            ->where("users.id", "=", Auth::id())
            ->get();
        $ruangan = Room::all();
        $tujuan_akses = TujuanAkses::all();
        $sumber_dana = SumberDana::all();
        return view('peminjaman.form.create.index', [
            'ruangan' => $ruangan,
            'prodi' => $prodi,
            'tujuan_akses' => $tujuan_akses,
            'sumber_dana' => $sumber_dana
        ]);
    }

    public function store(PeminjamanRequest $request)
    {
        // dd($request);
        Peminjaman::create($request->validated());
        return redirect('/dashboard')->with('success', 'Form telah dibuat, silahkan cek status form di menu status');
        // $user = User::whereRoleIs('admin')->get();
        // Notification::send($user);
    }

    public function generate_permohonan($id)
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
            ->select("users.name", "user_mahasiswa.nim", "users.email", "prodi.nama_prodi", "user_mahasiswa.alamat", "user_mahasiswa.phone", "surat_peminjaman_lab.keterangan", "surat_peminjaman_lab.judul_penelitian", "ruang_lab.nama_ruang", "surat_peminjaman_lab.no_surat")
            ->where("users.id", "=", Auth::id())
            ->where("surat_peminjaman_lab.id", "=", $id)
            ->get();

        $pdf = PDF::loadView('peminjaman.form.cetak.permohonan', ['data' => $data]);
        return $pdf->stream();
    }

    public function generate_persetujuan($id)
    {
        $data = DB::table("surat_peminjaman_lab")
            ->join("users", function ($join) {
                $join->on("surat_peminjaman_lab.user_id", "=", "users.id");
            })
            ->join("user_mahasiswa", function ($join) {
                $join->on("users.id", "=", "user_mahasiswa.user_id");
            })
            ->join("prodi", function ($join) {
                $join->on("user_mahasiswa.prodi_id", "=", "prodi.id");
            })
            ->select("users.name", "surat_peminjaman_lab.no_surat", "user_mahasiswa.nim", "prodi.nama_prodi", "surat_peminjaman_lab.judul_penelitian", "surat_peminjaman_lab.keterangan", "surat_peminjaman_lab.sumber_dana", "surat_peminjaman_lab.pembimbing", "user_mahasiswa.phone", "users.email", "user_mahasiswa.alamat", "surat_peminjaman_lab.tanggal_awal_peminjaman", "surat_peminjaman_lab.tanggal_akhir_peminjaman")
            ->where("users.id", "=", Auth::id())
            ->where("surat_peminjaman_lab.id", "=", $id)
            ->get();
        $pdf = PDF::loadView('peminjaman.form.cetak.persetujuan', ['data' => $data]);
        return $pdf->stream();
    }
}
