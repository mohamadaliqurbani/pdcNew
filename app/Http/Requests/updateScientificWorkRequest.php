<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateScientificWorkRequest extends FormRequest
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

    public function messages()
    {
        return [
            "title.required" => 'عنوان اثر را بنوسید ',
            "title.required" => 'عنوان اثر  باید حروف باشد ',

            "type.required" => 'نوعیت اثر را بنوسید ',

            "level.required" => 'سطح اثر را بنوسید ',
          

            "dicribesion.required" => 'توضیحات اثر را بنوسید ',
            "dicribesion.string" => 'توضیحات اثر  باید حروف باشد ',

            "relase_date.required" => 'تاریخ نشر اثر را بنوسید ',
            "relase_date.date" => 'تاریخ نشر اثر  باید از نوع تاریخ  باشد ',

            "duration.string" => 'توضیحات در مورد زمان در بر گرفته اثر  باید حروف باشد ',
            "cover_photo.image" => 'فایل انتخاب شده باید عکس باشد ',
            "cover_photo.mimes" => ' عکس انتخاب شده باید از نوع png باشد',
            "work_url.url" => ' نشانه یا url  باید درست باشد ',
            "file_work.required" => 'فایل پی دی اف اثر را آپلود نماید',
            "file_work.file" => 'فایل انتخاب شده باید فایل پی دی اف باشد',
            "file_work.mimes" => 'فایل انتخاب شده باید فایل پی دی اف باشد',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => ['required', 'string'],
            'level'=>['required','string'],
            'type'=>['required','string'],
            "dicribesion" => ['required', 'string'],
            "relase_date" => ['required', 'date'],
            "duration" => ['sometimes', 'string'],
            "cover_photo" => ['sometimes', 'image', 'mimes:png'],
            "work_url" => ['sometimes', 'url'],
            'file_work' => ['sometimes', 'file', 'mimes:pdf'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->work_url == null) {
            $this->request->remove('work_url');
        }
        if ($this->cover_photo == null) {
            $this->request->remove('cover_photo');
        }
        if ($this->duration == null) {
            $this->request->remove('duration');
        }
        if ($this->file_work == null) {
            $this->request->remove('file_work');
        }
    }
}
