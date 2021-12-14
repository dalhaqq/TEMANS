<?php

namespace App\Http\Requests;

class OperatorRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    public function store()
    {
        return [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }

    /**
     * Get the validation rules that apply to the put/patch request.
     *
     * @return array
     */
    public function update()
    {
        $operator = request()->route('operator');
        return [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email,' . $operator,
            'username' => 'required|unique:users,username,' . $operator
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email',
            'name' => 'Nama',
            'username' => 'Username',
            'password' => 'Password',
            'password_confirmation' => 'Konfirmasi password'
        ];
    }
}
