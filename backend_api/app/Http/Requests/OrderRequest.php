<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
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
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer',

        ];
    }
    public function message()
    {
        return [
            'products.*.product_id' => "Select a Valid Product",
            'products.*.quantity' => 'Add A Product Quantity'
        ];
    }
}
