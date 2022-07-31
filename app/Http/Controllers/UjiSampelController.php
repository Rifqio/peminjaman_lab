<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembayaranRequest;
use App\Http\Requests\UjiLabRequest;
use App\Http\Requests\UjiSampelRequest;
use App\Models\Pembayaran;
use App\Models\UjiSampel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UjiSampelController extends Controller
{
    public function index()
    {
        return view('student.ujiSampel.home.index');
    }

    public function status()
    {
        $relation = DB::table("pembayaran")
        ->join("status_pembayaran", "pembayaran.status_pembayaran", "=", "status_pembayaran.id")
        ->join("surat_data_uji_sampel", "surat_data_uji_sampel.id", "=", "pembayaran.uji_sampel_id")
        ->select("pembayaran.url_bukti_pembayaran","surat_data_uji_sampel.id","surat_data_uji_sampel.no_surat", "surat_data_uji_sampel.no_pembayaran", "surat_data_uji_sampel.nama_sampel", "status_pembayaran.status", "surat_data_uji_sampel.tanggal_masuk", "surat_data_uji_sampel.tanggal_selesai")
        ->where("surat_data_uji_sampel.user_id", "=", Auth::user()->id)
        ->get();

        return view('student.ujiSampel.status.index',[
            'data' => $relation,
        ]);
    }

    public function create()
    {
        $prodi =
            DB::table("users")
            ->join("user_mahasiswa", "users.id", "=", "user_mahasiswa.user_id")
            ->join("prodi", "user_mahasiswa.prodi_id", "=", "prodi.id")
            ->where("users.id", "=", Auth::id())
            ->get();
        return view('student.ujiSampel.form.index', [
            'prodi' => $prodi,
        ]);
    }

    public function store(UjiLabRequest $request1)
    {

        $data = UjiSampel::create($request1->validated());

        $bayar = [
            'user_id' => Auth::user()->id,
            'kode_bayar' => $data->no_pembayaran,
            'uji_sampel_id' => $data->id,
            'status_pembayaran' => 1,
        ];

        Pembayaran::create($bayar);

        return redirect('/dashboard')->with('success', 'Form telah berhasil dibuat, silahkan cek status pembayaran anda di halaman status.');
    }

    public function bukti_pembayaran(UjiSampelRequest $request)
    {
        if ($request->old_image) {
            Storage::delete($request->old_image);
        }

        Pembayaran::where('id', request('pembayaran_id'))
            ->update([
                'url_bukti_pembayaran' => $request->file('bukti_pembayaran')->store('bukti_pembayaran'),
                'status_pembayaran' => 2
            ]);

        return redirect('dashboard');
    }
}
