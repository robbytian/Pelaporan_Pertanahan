<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReportRequest extends FormRequest
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
        if (Auth::User()->level == 3) {
            return [
                'kegiatans' => 'required',
                'keterangan' => 'required',
                'peserta' => 'required',
                'keluhan' => 'present'
            ];
        } else {
            return [
                'saran' => 'present'
            ];
        }
    }

    public function messages()
    {
        return [
            'kegiatans' => 'Pilih minimal 1 kegiatan',
            'keterangan' => 'Field Keterangan tidak boleh kosong',
            'peserta' => 'Field Peserta tidak boleh kosong',
        ];
    }
}
