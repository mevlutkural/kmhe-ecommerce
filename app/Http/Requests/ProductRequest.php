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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name'      => 'required|sometimes|string|min:2',
            'category_id'       => 'required|sometimes|min:1',
            'product_price'     => 'required|sometimes|min:1|max:8',
            'short_description' => 'required|sometimes|string|min:8',
            'description'       => 'required|sometimes|string|min:20'
        ];
    }
}
