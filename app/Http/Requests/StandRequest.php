<?php

namespace App\Http\Requests;

class StandRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    public function store()
    {
        return [
            'no' => 'required|integer|min:1|unique:stands,no',
            'location' => 'required',
            'price' => 'required|integer|min:1',
            'area' => 'required|integer|min:1',
            'type' => 'required',
            'description' => 'required',
            'facilities' => 'required',
            'image' => 'required|image'
        ];
    }

    /**
     * Get the validation rules that apply to the put/patch request.
     *
     * @return array
     */
    public function update()
    {
        $stand = request()->route('stand');
        return [
            'no' => 'required|integer|min:1|unique:stands,no,' . $stand->id,
            'location' => 'required',
            'price' => 'required|integer|min:1',
            'area' => 'required|integer|min:1',
            'type' => 'required',
            'description' => 'required',
            'facilities' => 'required',
            'image' => 'nullable|image'
        ];
    }
}
