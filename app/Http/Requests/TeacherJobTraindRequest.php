<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherJobTraindRequest extends FormRequest
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
        return [
            "country"=>['required','string','max:255'],
            "edu_center"=>['required','string','max:255'],
            "edu_field"=>['required','string','max:255'],
            "duration"=>['required','string','max:255'],
            "start_date"=>['required','date'],
            "end_date"=>['required','date']
        ];
    }
}
