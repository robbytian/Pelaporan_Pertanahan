<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'jumlahRealisasi' => 'required',
            'tahapan' => 'required',
            'targetFisik' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'jumlahRealisasi.required' => 'Field Realisasi Fisik Tidak Boleh Kosong',
            'tahapan.required' => 'Pilih Salah satu Tahapan!',
            'targetFisik.required' => 'Field NIP Tidak Boleh Kosong',
        ];
    }
}
