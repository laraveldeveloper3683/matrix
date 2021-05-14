<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
      $rules =  [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students',
            'university_id' => 'required',
            'phone' => 'required|numeric|digits:10',
        ];

        return $rules;
    }
}
