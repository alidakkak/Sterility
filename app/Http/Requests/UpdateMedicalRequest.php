<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicalRequest extends FormRequest
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
            'weight' => 'numeric',
            'height' => 'numeric',
            'do_you_have_children' => 'string',
            'do_you_have_an_illness' => 'string',
            'are_you_taking_medication' => 'string',
            'number_of_years_of_marriage' => 'string',
            'have_you_been_treated_before' =>'string',
            'what_type_of_treatment' => 'string',
            'how_many_times_was_the_treatment_taken' => 'string',
            'do_you_have_varicocele' => 'string',
            'is_there_a_previous_analysis' => 'string',
            'are_there_other_diseases' => 'string',
        ];
    }
}
