<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOutSidePresentor extends FormRequest
{
    public function messages()
    {
        return [
            'name.required'=>'اسم را بنوسید!',
            'name.string'=>'اسم  را به حروف بنوسید!',
            'name.max'=>'اسم  از صد کراکتر برزگ بوده نمی تواند!',

            'lname.required'=>'تحلض را بنوسید!',
            'lname.string'=>'تحلض  را به حروف بنوسید!',
            'lname.max'=>'تحلض  از صد کراکتر برزگ بوده نمی تواند!',


            'education.required'=>'میزان تحصیلات را بنوسید',
            'education.string'=>'میزان تحصیلات را به حروف بنوسید',
            'education.max'=>'میزان تحصیلات از ۲۵۴ کراکتر بزرگ بوده نمی تواند',
          

            'email.required'=>'ایمیل  را بنوسید!',
            'email.email'=>'ایمیل باید از نوع ایمیل درست باشد',
            'email.max'=>'ایمیل از ۱۵۰ کراکتر بزرگ بوده نمی تواند',
            // 'email.unique'=>'این ایمیل قبلا توسطی کسی دیگر گرفته شده ایمیل دیگری را امتحان نماید',


            'gender.required'=>'جسیت ار انتخاب نماید!',
            'gender.in'=>'جسیت انتخاب شده باید مرد یا زن باشد',

            'phone.required'=>'شماره تماس را بنوسید',
            'phone.max'=>'شماره تماس از ۱۴ کراکتر بزرگ بوده نمی تواند',
            'phone.min'=>'شماره تماس از ۱۰ کراکتر گوچک بوده نمی تواند',
            // 'phone.unique'=>'شماره تماس قبلا توسطی کسی دیگری گرفته شده شماره تماس دیگر را انتخاب نماید',

            'image.required'=>'عکس ارایه دهنده را انتخاب نماید',
            'image.image'=>'فایل انتخاب شده باید از نوع عکس باشد',
            'image.mimes'=>'پوسند عکس انتخاب شده بغیر از png,jpeg,jpg دیگر کدام پوسند دیگر بوده نمی تواند',
            'info.string'=>'معلومات باید از نوع حروف باشد'

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
            "name" => ['required', 'string', 'max:100'],
            "lname" => ['required', 'string', 'max:100'],
            "education" => ['required', 'string', 'max:255'],
            "email" => ['sometimes', 'email', 'max:150'],
            "phone" => ['required', 'string', 'max:14'],
            "gender" => ['required',  'in:مرد,زن'],
            "image" => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
            "info" => ['sometimes', 'string']
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->info == null) {
            $this->request->remove('info');
        }else if($this->image==null){
            $this->request->remove('image');
        }
    }
}
