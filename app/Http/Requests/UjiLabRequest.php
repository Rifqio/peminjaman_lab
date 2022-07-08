<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UjiLabRequest extends FormRequest
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
            'user_id' => 'required',
            'no_surat' => 'required',
            'no_pembayaran' => 'required',
            'nama_analisa' => 'required',
            'nama_sampel' => 'required',
            'jumlah_sampel' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_selesai' => 'required',
            'catatan' => 'required',
        ];
    }

    //Pengisian no_surat dan status_pembayaran
    public function prepareForValidation() {
        
        $this->merge([
            'user_id' => Auth::user()->id,
            'no_surat' => str_replace('-', '', Carbon::now()->toDateString())."03".rand(10, 99),
            'no_pembayaran' => "B".str_replace([':'], '', Carbon::now()->toTimeString())."03".rand(10, 99),
            'tanggal_masuk' => Carbon::now(),
            'tanggal_selesai' => Carbon::now()->addWeek(2),

        ]);
    }
}
