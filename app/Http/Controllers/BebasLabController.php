<?php

namespace App\Http\Controllers;

use App\Http\Requests\BebasLabRequest;
use Carbon\Carbon;
use App\Models\BebasLab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BebasLabController extends Controller
{
    public function index()
    {
        
        if (Auth::user()->mahasiswa->nim === null) {
            return redirect('/dashboard')->with('warning', 'Mohon untuk melengkapi profil sebelum mengisi surat bebas lab');
        }
        return view('bebasLab.home.index');
    }

    public function create()
    {
        $prodi =
        DB::table("users")
        ->join("user_mahasiswa", function($join){
            $join->on("users.id", "=", "user_mahasiswa.user_id");
        })
        ->join("prodi", function($join){
            $join->on("user_mahasiswa.prodi_id", "=", "prodi.id");
        })
        ->where("users.id", "=", Auth::id())
        ->get();

        return view('bebasLab.form.index', [
            'prodi' => $prodi
        ]);
    }

    public function store(BebasLabRequest $req)
    {
        BebasLab::create($req->validated());
        return redirect('dashboard')->with('success', 'Form telah diajukan, silahkan cek email berkala');
    }

    public function status_surat()
    {
        $data =
        DB::table("surat_permohonan_bebas_lab")
        ->Join("status_aktivasi", function($join){
            $join->on("surat_permohonan_bebas_lab.status_id", "=", "status_aktivasi.id");
        })
        ->Join("user_mahasiswa", function($join){
            $join->on("surat_permohonan_bebas_lab.user_mahasiswa_id", "=", "user_mahasiswa.id");
        })
        ->select("surat_permohonan_bebas_lab.id", "surat_permohonan_bebas_lab.no_surat", "surat_permohonan_bebas_lab.judul", "surat_permohonan_bebas_lab.status_id", "surat_permohonan_bebas_lab.created_at", "surat_permohonan_bebas_lab.updated_at", "status_aktivasi.status", "surat_permohonan_bebas_lab.keterangan")
        ->where("user_mahasiswa.user_id", "=", Auth::id())
        ->get();

        return view('peminjaman.form.status.bebaslab', [
            'data' => $data,
        ]);
    }
}
