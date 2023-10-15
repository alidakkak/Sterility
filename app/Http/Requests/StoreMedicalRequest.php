<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalRequest extends FormRequest
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
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'do_you_have_children' => 'required|string',
            'do_you_have_an_illness' => 'required|string',
            'are_you_taking_medication' => 'required|string',
            'number_of_years_of_marriage' => 'required|string',
            'have_you_been_treated_before' =>'required|string',
            'what_type_of_treatment' => 'required|string',
            'how_many_times_was_the_treatment_taken' => 'required|string',
            'do_you_have_varicocele' => 'required|string',
            'is_there_a_previous_analysis' => 'required|string',
            'are_there_other_diseases' => 'required|string',
        ];
    }
}
