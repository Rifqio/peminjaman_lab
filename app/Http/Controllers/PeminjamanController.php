<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Peminjaman;
use App\Models\User;
use App\Notifications\CreatePeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
        return view('peminjaman.form.create.index', [
            'ruangan' => $ruangan,
            'prodi' => $prodi
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'ruang_lab_id' => 'required',
        //     'keterangan' => 'required'
        // ]);
        // $user = User::all();
       Peminjaman::create([
            'ruang_lab_id' => request('ruang_lab_id'),
            'user_id' => Auth::id(),
            'keterangan' => request('keterangan'),
            'judul_penelitian' => request('judul_penelitian'),
            'sumber_dana' => request('sumber_dana'),
            'pembimbing' => request('pembimbing'),
            'no_surat' => str_replace('-', '', Carbon::now()->toDateString())."01".rand(10, 99),
            'tanggal_awal_peminjaman' => request('tanggal_awal_peminjaman'),
            'tanggal_akhir_peminjaman' => request('tanggal_akhir_peminjaman'),
            'status_id' => 1
        ]);
        // $peminjaman->notify(new CreatePeminjaman())->$user->hasRole('admin');
        return redirect('/dashboard')->with('success', 'Form telah dibuat, silahkan cek status form di menu status');
    }

    public function generate_pdf($id)
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

        $pdf = PDF::loadView('peminjaman.form.cetak.cetak', ['data' => $data]);
        return $pdf->stream();
    }
}
