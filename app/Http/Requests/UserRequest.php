<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class UserRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the put/patch request.
     *
     * @return array
     */
    public function update()
    {
        $user = Auth::user();
        $validate = [
            'name' => 'required'
        ];
        if($user->hasRole('tenant')){
            $validate = [
                'name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'zip_code' => 'required|integer|min:1',
                'phone_number' => 'required',
                'photo' => 'nullable|image',
                'id_card' => 'nullable|image',
            ];
        }
        return $validate;
    }

    public function attributes()
    {
        return [
            'name' => 'Nama',
            'address' => 'Alamat',
            'city' => 'Kota',
            'zip_code' => 'Kode pos',
            'phone_number' => 'No HP',
            'photo' => 'Foto diri',
            'id_card' => 'Foto KTP',
        ];
    }
}
