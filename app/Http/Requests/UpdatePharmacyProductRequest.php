<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePharmacyProductRequest extends CustomFormRequest
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
            'product_price'    => 'required|min:0,01|max:99999999,99',
            'product_quantity' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'product_price.required'    => 'Product Title is Required',
            'product_quantity.required' => 'Product Description is Required',
        ];
    }
}
