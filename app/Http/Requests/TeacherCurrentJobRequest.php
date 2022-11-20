<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherCurrentJobRequest extends FormRequest
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
            "minstry"=>['required','string','max:254'],
            "departement"=>['required','string','max:254'],
            "job_title"=>['required','string','max:254'],
            "position"=>['required','string','max:254'],
            "reg_date"=>['required','string','max:254'],
            "jop_posistion"=>['required','string','max:254']
        ];
    }
}
