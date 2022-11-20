<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{

    public function messages()
    {
       return [
            'education_degree.required'=>'میزان تحصیلات را بنوسید',
            'education_degree.string'=>'میزان تحصیلات باید از نوع حروف باشد ',
            'education_degree.max'=>'میزان تحصیلات از صد کراکتر بزرگ بوده نمی تواند ',
            'jop_posistion.max'=>'بست وظیفوی از صد کراکتر بزرگ بوده نمی تواند ',
            'jop_posistion.required'=>'بست وظیفوی را بنوسید ',
            'jop_posistion.string'=>' بست وظیفوی باید از نوع حروف باشد ',
            'emp_phone.required'=>'شماره تماس را بنوسید ',
            'emp_phone.max'=>'شماره تماس  از ۱۴ بزرگ بوده نمی تواند ',
            'emp_phone.min'=>'شماره تماس  از ۱۰ کوچگ  بوده نمی تواند ',
            'emp_phone.unique'=>'شماره تماس قبلا توسطی کسی دیگر گرفته شده',
        ];
    }
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
            "education_degree" => ['required', 'string', 'min:3', 'max:100'],
            // "emp_lname" => ['required', 'string', 'min:3', 'max:100'],
            "jop_posistion" => ['required', 'string', 'min:3', 'max:100'],
            "emp_phone" => ['required', 'string', 'min:10', 'max:14', 'unique:employees'],
            // "emp_email" => ['required', 'email', 'max:150', 'unique:employees'],
            // "emp_image" => ['required', 'image', 'mimes:png,jpg,jpeg']
        ];
    }
}
