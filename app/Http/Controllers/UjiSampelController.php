<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembayaranRequest;
use App\Http\Requests\UjiLabRequest;
use App\Models\Pembayaran;
use App\Models\UjiSampel;
use Illuminate\Http\Request;

class UjiSampelController extends Controller
{
    public function store(UjiLabRequest $request1, PembayaranRequest $request2) {
        // dd($request);
        UjiSampel::create($request1->validated());
        Pembayaran::create($request2->validated());
        return redirect('/dashboard')->with('success', 'Form telah dibuat, silahkan cek status form di menu status');
    }
}
