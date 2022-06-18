<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PeminjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ruang_lab_id' => 'required|integer|not_in:0',
            'tujuan_akses_id' => 'required',
            'judul_penelitian' => 'required',
            'tanggal_awal_peminjaman' => 'required|date|after:yesterday',
            'tanggal_akhir_peminjaman' => 'required',
            'judul_penelitian' => 'nullable',
            'sumber_dana_id' => 'nullable',
            'pembimbing' => 'nullable',
            'user_id' => 'required',
            'status_id' => 'required',
            'no_surat' => 'required',
        ];
    }

    // Mengisi data sekaligus validasi
    public function prepareForValidation()
    {
        $tanggal_awal_peminjaman = request('tanggal_awal_peminjaman');
        $this->merge([
            'user_id' => Auth::id(),
            'status_id' => 1,
            'no_surat' => str_replace('-', '', Carbon::now()->toDateString())."01".rand(10, 99),
            'tanggal_akhir_peminjaman' => Carbon::parse($tanggal_awal_peminjaman)->addMonths(4)
        ]);
    }

    // Custom Error Messages
    public function messages()
    {
        return [
            'ruang_lab_id.required' => 'Mohon pilih ruang',
            'keterangan.required' => 'Wajib memberikan keterangan',
            'judul_penelitian.required' => 'Wajib memberikan judul penelitian',
        ];
    }
}
