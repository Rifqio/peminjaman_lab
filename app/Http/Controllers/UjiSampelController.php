<?php

namespace App\Http\Controllers;

use App\Http\Requests\UjiLabRequest;
use App\Models\UjiSampel;
use Illuminate\Http\Request;

class UjiSampelController extends Controller
{
    public function store(UjiLabRequest $request) {
        // dd($request);
        UjiSampel::create($request->validated());
        return redirect('/dashboard')->with('success', 'Form telah dibuat, silahkan cek status form di menu status');
    }
}
