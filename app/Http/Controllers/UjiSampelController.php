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
