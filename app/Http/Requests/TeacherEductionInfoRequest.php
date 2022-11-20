<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherEductionInfoRequest extends FormRequest
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
            "ed_place"=>['required','string','min:3','max:255'],
            "ed_center_name"=>['required','string','min:3','max:255'],
            "eduDegree"=>['required','string','min:3','max:255'],
            "collage"=>['required','string','min:3','max:255'],
            "ed_faild"=>['required','string','min:3','max:255'],
            "started_date"=>['required'],
            "end_date"=>['required']
        ];
    }
}
