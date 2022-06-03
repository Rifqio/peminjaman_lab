<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $tanggal_awal = "peminjaman.tanggal_awal_peminjaman";
        $data =
            DB::table("peminjaman")
            ->join("status_aktivasi", function ($join) {
                $join->on("peminjaman.status_id", "=", "status_aktivasi.id");
            })
            ->join("rooms", function ($join) {
                $join->on("peminjaman.room_id", "=", "rooms.id");
            })
            ->select("peminjaman.keterangan", "status_aktivasi.status", "rooms.nama_ruang", "status_aktivasi.id",   $tanggal_awal)
            ->where("peminjaman.user_id", "=", auth()->user()->id)
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

        $tanggal_awal = Carbon::parse($request->tanggal_awal_peminjaman)->toDateTimeString();
        $tanggal_akhir = Carbon::parse($request->tanggal_awal_peminjaman)->toDateTimeString();


        // if (request('name') !== Auth::user()->name && Auth::user()->email) {
        //     return redirect('/peminjaman/create')->with('warning', 'Email atau nama tidak sama');
        // }

        Peminjaman::create([
            'room_id' => $request->room,
            'keterangan' => $request->keterangan,
            'user_id' => $request->user_id,
            'tanggal_awal_peminjaman' =>  $tanggal_awal,
            'tanggal_akhir_peminjaman' => $tanggal_akhir,
            'status_id' => $request->status_id,
        ]);
        return redirect('/dashboard')->with('success', 'Form telah dibuat, silahkan cek email berkala untuk menunggu verifikasi');
    }
}
