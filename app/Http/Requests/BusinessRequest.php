<?php

namespace App\Http\Requests;

class BusinessRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    public function store()
    {
        return [
            'name' => 'required',
            'product_type' => 'required',
            'revenue' => 'required|integer|min:1',
            'proposal' => 'mimes:pdf,docx,doc'
        ];
    }

    /**
     * Get the validation rules that apply to the put/patch request.
     *
     * @return array
     */
    public function update()
    {
        return [
            'name' => 'required',
            'product_type' => 'required',
            'revenue' => 'required|integer|min:1',
            'proposal' => 'nullable|mimes:pdf,docx,doc'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama',
            'product_type' => 'Jenis produk',
            'revenue' => 'Omzet',
            'proposal' => 'Proposal'
        ];
    }
}
