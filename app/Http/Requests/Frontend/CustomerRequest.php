<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class CustomerRequest extends FormRequest
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
        $customer_id = request()->get('customer_id');
        return [
            'name_surname' => 'required|sometimes|string|min:3',
            'email'        => "required|sometimes|email|unique:App\Models\Customer,email,$customer_id",
            'phone_number' => "required|sometimes|numeric|unique:App\Models\Customer,email,$customer_id",
            'password'     => "required|sometimes|string|min:4|confirmed"
        ];
    }

    protected function passedValidation()
    {
        if ($this->request->has("password")) {
            $password = $this->request->get("password");
            $this->request->set("password", Hash::make($password));
        }
    }
}
