<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Peminjaman;
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
        } else {
            return view('peminjaman.home.index');
        }
    }

    public function status_peminjaman()
    {
        $tanggal_awal = "surat_peminjaman_lab.tanggal_awal_peminjaman";
        $data =
            DB::table("surat_peminjaman_lab")
            ->join("status_aktivasi", function ($join) {
                $join->on("surat_peminjaman_lab.status_id", "=", "status_aktivasi.id");
            })
            ->join("ruang_lab", function ($join) {
                $join->on("surat_peminjaman_lab.ruang_lab_id", "=", "ruang_lab.id");
            })
            ->select("surat_peminjaman_lab.keterangan", "status_aktivasi.status", "ruang_lab.nama_ruang", "status_aktivasi.id",   $tanggal_awal)
            ->where("surat_peminjaman_lab.user_id", "=", auth()->user()->id)
            ->get();

        return view('peminjaman.form.status.index', ['data' => $data]);
    }

    public function create()
    {
        $ruangan = Room::all();
        return view('peminjaman.form.create.index', [
            'ruangan' => $ruangan,
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'ruang_lab_id' => 'required',
        //     'keterangan' => 'required'
        // ]);
        Peminjaman::create([
            'ruang_lab_id' => request('ruang_lab_id'),
            'user_id' => Auth::id(),
            'keterangan' => request('keterangan'),
            'tanggal_awal_peminjaman' => request('tanggal_awal_peminjaman'),
            'tanggal_akhir_peminjaman' => request('tanggal_akhir_peminjaman'),
            'status_id' => 1
        ]);
        return redirect('/dashboard')->with('success', 'Form telah dibuat, silahkan cek email berkala untuk menunggu verifikasi');
    }

}
