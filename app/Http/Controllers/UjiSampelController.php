<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembayaranRequest;
use App\Http\Requests\UjiLabRequest;
use App\Models\Pembayaran;
use App\Models\UjiSampel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjiSampelController extends Controller
{
    public function store(UjiLabRequest $request1) {

        $data = UjiSampel::create($request1->validated());

        $bayar = [
            'user_id' => Auth::user()->id,
            'kode_bayar' => $data->no_pembayaran,
            'uji_sampel_id' => $data->id,
            'status_pembayaran' => 1,
        ];

        Pembayaran::create($bayar);

        return redirect('/uji-sampel/checkout')->with('success', 'Form telah berhasil dibuat, silahkan melakukan pembayaran.');
    }

    public function checkout()
    {
        return view('guest.checkout');
    }
}
