<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyRequest extends CustomFormRequest
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
            'pharmacy_name'    => 'required|string|min:5',
            'pharmacy_address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pharmacy_name.required'    => 'Pharmacy Name is Required',
            'pharmacy_address.required' => 'Pharmacy Address is Required',

        ];
    }

}
