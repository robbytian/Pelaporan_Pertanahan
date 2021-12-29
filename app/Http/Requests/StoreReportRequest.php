<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'tanggal_laporan' => 'required',
            'kegiatans' => 'required',
            'keterangan' => 'required',
            'peserta' => 'required',
            'foto' => 'max:1000|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'tanggal_laporan' => 'Field Tanggal Laporan tidak boleh kosong',
            'kegiatans' => 'Pilih minimal 1 kegiatan',
            'keterangan' => 'Field Keterangan tidak boleh kosong',
            'peserta' => 'Field Peserta tidak boleh kosong',
            'foto.max' => 'Foto tidak boleh lebih dari 1MB'
        ];
    }
}
