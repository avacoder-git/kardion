<?php

namespace App\Http\Requests\Api\V1\Application;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
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
            'full_name' => 'required|string',
            'address' => 'required|string',
            'birth_date' => 'required|string',
            'phone_number' => 'required|numeric',
            'type' => 'required|numeric',
            'status_id' => 'required|numeric',
        ];
    }
}
