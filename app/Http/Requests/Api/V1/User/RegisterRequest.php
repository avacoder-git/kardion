<?php

namespace App\Http\Requests\Api\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'phone_number'=>'required|numeric|unique:users',
            'password'=>'required|string|confirmed',
        ];
    }
}
