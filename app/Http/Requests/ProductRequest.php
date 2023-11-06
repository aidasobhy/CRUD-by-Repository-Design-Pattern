<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends CustomFormRequest
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
            'product_title'       => 'required|string',
            'product_description' => 'required',
            'product_image'       => 'required|mimes:jpeg,png,jpg,gif'
        ];
    }

    public function messages()
    {
        return [
            'product_title.required'=>'Product Title is Required',
            'product_description.required'=>'Product Description is Required',
            'product_image.required'=>'Product Image is Required',
        ];
    }

}
