<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $brand_id = request()->input('brand_id');
        return [
            'name'         => 'required|sometimes|string|min:2',
            'alt'          => 'required|sometimes|min:2',
            'image_url'    => 'required|min:2|image',
            'sequence'     => "required|sometimes|min:1|unique:App\Models\Brand,sequence,$brand_id"
        ];
    }
}
