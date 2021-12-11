<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'email:required' => 'Email tidak boleh kosong',
            'email:email' => 'Email tidak valid',
            'email:unique' => 'Email sudah digunakan',
            'name:required' => 'Nama tidak boleh kosong',
            'username:required' => 'Username tidak boleh kosong',
            'username:unique' => 'Username sudah digunakan',
            'password:required' => 'Password tidak boleh kosong',
            'password:min' => 'Password minimal :min karakter',
            'password_confirmation:same' => 'Password tidak sama'
        ];
    }
}
