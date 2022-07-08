<?php

namespace App\Http\Requests;

use App\Models\UjiSampel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PembayaranRequest extends FormRequest
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
            'uji_sampel_id' => 'required',
            'kode_bayar' => 'required',
            'status_pembayaran' => 'required',
        ];
    }

    public function prepareForValidation() {
        $this->merge([
            'user_id' => Auth::user()->id,
            'uji_sampel_id' => UjiSampel::latest()->first()->id,
            'kode_bayar'=> UjiSampel::latest()->first()->no_pembayaran,
            'status_pembayaran' => 1
        ]);
    }
}
