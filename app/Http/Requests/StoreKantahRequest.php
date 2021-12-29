<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreKantahRequest extends FormRequest
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
            'email' => 'required',
            'head_name' => 'required',
            'nip_head_name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field Nama Tidak Boleh Kosong',
            'email.required' => 'Field Email Tidak Boleh Kosong',
            'head_name.required' => 'Field Head_Name Tidak Boleh Kosong',
            'nip_head_name.required' => 'Field NIP Tidak Boleh Kosong',
            'username.required' => 'Field Username Tidak Boleh Kosong',
            'username.unique' => 'Username sudah dipakai oleh akun lain',
            'password.required' => 'Field Password Tidak Boleh Kosong'
        ];
    }
}
