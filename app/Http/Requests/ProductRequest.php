<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string',
            'lot_id' => 'required|numeric',
            'color' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'lot_id.required' => 'Lot is is required!',
            'color.required' => 'Color is required!',
            'description.required' => 'Description is required!',
            'price.required' => 'Price is required!',
        ];
    }
}
