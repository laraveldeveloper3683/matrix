<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //  private $id;
    //
    //  public function __construct($id)
    // {
    //     $this->id = $id;
    // }
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
      //$id = request()->route()->parameter('student');
      $rules =  [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email,'. $this->student,
            'university_id' => 'required',
            'phone' => 'required|numeric|digits:10',
        ];

        return $rules;
    }
}
