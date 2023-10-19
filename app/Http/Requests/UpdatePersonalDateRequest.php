<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalDateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string',
            'date' => 'sometimes|required',
            'gender' => 'sometimes|required',
            'country' => 'sometimes|required|string',
            'email' => 'sometimes|required|unique:personal_data,email',
            'phone' => 'sometimes|required|numeric',
            "password"=>"sometimes|required|confirmed|min:6",
        ];
    }
}
