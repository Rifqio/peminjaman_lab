<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BebasLabRequest extends FormRequest
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
            'user_mahasiswa_id' => 'required',
            'no_surat' => 'required',
            'keterangan' => 'required',
            'status_id' => 'required',
            'judul' => 'required'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_mahasiswa_id' => Auth::user()->mahasiswa->id,
            'no_surat' => str_replace('-', '', Carbon::now()->toDateString())."02".rand(10, 99),
            'status_id' => 1
        ]);
    }
}
