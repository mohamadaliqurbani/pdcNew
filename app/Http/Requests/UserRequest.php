<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => ['required', 'string', 'min:3', 'max:255'],
            "lname" => ['required', 'string', 'min:3', 'max:255'],
            "image" => ['image', 'min:3', 'max:5120', 'mimes:png,jpg,jpeg'],
            "email" => ['required', 'email', 'min:3', 'max:255', 'unique:users,email,' . $this->user->id]
        ];
    }

    public function messages()
    {
        return [
            "name.required"=>'نوشتن  اسم حتمی میباشد',
            "name.string"=>'اسم بادید حروف باشد',
            "name.min"=>'اسم باید بیشتر از دو حرف باشد',
            "name.max"=>'اسم بیشتر از ۲۵۴ کراکتر بود نه می تواند',
            "email.unique" => "ایمیل توسط کسی دیگر گرفته شده است !"
        ];
    }
}
