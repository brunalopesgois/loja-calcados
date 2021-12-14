<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_document' => 'required|string|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            'seller_id' => 'required|numeric'
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
            'customer_document.required' => 'Customer is required!',
            'seller_id.required' => 'Seller is is required!'
        ];
    }
}
