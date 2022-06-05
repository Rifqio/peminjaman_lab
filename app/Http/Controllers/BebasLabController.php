<?php

namespace App\Http\Controllers;

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

    public function store()
    {
        BebasLab::create([
            'user_mahasiswa_id' => Auth::user()->mahasiswa->id,
            'no_surat' => str_replace('-', '', Carbon::now()->toDateString())."02".rand(10, 99),
            'keterangan' => request('keterangan'),
            'status_id' => 1,
            'judul' => request('judul')
        ]);
        return redirect('dashboard')->with('success', 'Form telah diajukan, silahkan cek email berkala');
    }

    public function status_surat()
    {

    }
}
