<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
        $user_id = request()->get('user_id');
        return [
            'name_surname' => 'required|sometimes|string|min:3',
            'email'        => "required|sometimes|email|unique:App\Models\User,email,$user_id",
            'password'     => "required|sometimes|string|min:4|confirmed"
        ];
    }
}
