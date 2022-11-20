<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherInfoUpdateRequest extends FormRequest
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
            "fname" => ['required', 'string', 'min:3', 'max:100'],
            "dob" => ['required', 'date'],
            "birthPlace" => ['required', 'string'],
            "phone" => ['required', 'string', 'min:10', 'max:14', 'unique:teacher_infos,phone,' . $this->teacherInfo->id],
            "Nid" => ['required', 'unique:teacher_infos,Nid,' . $this->teacherInfo->id],
            "accpet_date" => ['required', 'date'],
            // "department_id" => ['required']
        ];
    }
}
