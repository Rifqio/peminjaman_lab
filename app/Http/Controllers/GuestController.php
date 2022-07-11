<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.form.index');

    }

    public function menu()
    {
        return view('guest.home.menu');
    }

    public function status()
    {
        $relation = DB::table("pembayaran")
        ->join("status_pembayaran", "pembayaran.status_pembayaran", "=", "status_pembayaran.id")
        ->join("surat_data_uji_sampel", "surat_data_uji_sampel.id", "=", "pembayaran.uji_sampel_id")
        ->select("surat_data_uji_sampel.id","surat_data_uji_sampel.no_surat", "surat_data_uji_sampel.no_pembayaran", "surat_data_uji_sampel.nama_sampel", "status_pembayaran.status", "surat_data_uji_sampel.tanggal_masuk", "surat_data_uji_sampel.tanggal_selesai")
        ->where("surat_data_uji_sampel.user_id", "=", Auth::user()->id)
        ->get();

        return view('guest.home.status',[
            'data' => $relation,
        ]);
    }

}
