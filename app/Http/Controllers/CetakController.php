<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function generate()
    {
        $data = [
            'title' => 'Surat Peminjaman Lab',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('testPDF',  $data);
        return $pdf->download('surat-peminjaman-lab.pdf');
    }
}
