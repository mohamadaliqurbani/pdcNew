<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            "emp_name" => ['required', 'string', 'min:3', 'max:100'],
            "emp_lname" => ['required', 'string', 'min:3', 'max:100'],
            "jop_posistion" => ['required', 'string', 'min:3', 'max:100'],
            "emp_phone" => ['required', 'string', 'min:10', 'max:14', 'unique:employeess'],
            "emp_email" => ['required', 'email', 'max:150', 'unique:employeess'],
            "emp_image" => ['required', 'image', 'mimes:png,jpg,jpeg']
        ];
    }
}
