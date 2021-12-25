<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAkunRequest extends FormRequest
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
            'username' => 'required|unique:users,username,' . $this->id->id,
            'password_lama' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Field Username Tidak Boleh Kosong',
            'password_lama.required' => 'Field Password Lama Tidak Boleh Kosong',
            'password.required' => 'Field Password Baru Tidak Boleh Kosong',
            'password_confirmation.required' => 'Field Konfirmasi Password Tidak Boleh Kosong',
            'username.unique' => 'Username sudah dipakai oleh user lain',
            'password.confirmed' => 'Password dan Konfirmasi Password harus sesuai'
        ];
    }
}
