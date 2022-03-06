<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldstaffRequest extends FormRequest
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
            'name' => 'required',
            'date_born' => 'required',
            'alamat' => 'required',
            'phone_number' => 'required',
            'target' => 'required',
            'username' => 'required|unique:users,username,' . $this->dataFieldstaff->User->id,
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field Nama Tidak Boleh Kosong',
            'date_born.required' => 'Field Tanggal Lahir Tidak Boleh Kosong',
            'alamat.required' => 'Field Alamat Tidak Boleh Kosong',
            'phone_number.required' => 'Field No. Telepon Tidak Boleh Kosong',
            'username.required' => 'Field Username Tidak Boleh Kosong',
            'target.required' => 'Field Target Fisik Tidak Boleh Kosong',
            'username.unique' => 'Username sudah digunakan oleh akun lain',
            'password.required' => 'Field PAssword Tidak Boleh Kosong'
        ];
    }
}
