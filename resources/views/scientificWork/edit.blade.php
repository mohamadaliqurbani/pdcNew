@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        <div class="bg-purple-100 w-4/5 mx-auto rounded-lg shadow-2xl">
            <header class="p-2 mb-2">
                <p class="text-center font-extrabold">فورم بروز رسانی آثار علمی</p>
            </header>
            <div class="px-6 py-2 bg-white container">
                <form action="{{ route('scientific.update', $scientificWork->id) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    @method('patch')
                    <label for="title" class="block text-gray-700 mb-3"><span>عنوان</span>
                        <span class="text-red-500 mb-10">*</span>
                    </label>
                    <input type="text" class="w-full form-input mb-2 @error('title') border border-red-500 @enderror"
                        id="title" name="title" value="{{ $scientificWork->title }}">

                    @error('title')
                        <p class="text-red-500 font-semibold mb-1">{{ $message }}</p>
                    @enderror

                    <label for="type" class="block text-gray-700 mb-3"><span>نوعیت اثر</span>
                        <span class="text-red-500 mb-10">*</span>
                    </label>
                    <select name="type" class="w-full form-input mb-2 @error('type') border border-red-500 @enderror"
                        id="type">
                        <option value=""></option>
                        <option value="مقاله"  {{ $scientificWork->type=='مقاله'?'selected':'' }}>
                            مقاله
                        </option>
                        <option value="کتاب"  {{ $scientificWork->type=='کتاب'?'selected':'' }}>
                            کتاب
                        </option>
                    </select>

                    @error('type')
                        <p class="text-red-500 font-semibold mb-1">{{ $message }}</p>
                    @enderror
                    <label for="level" class="block text-gray-700 mb-3"><span>سطح اثر</span>
                        <span class="text-red-500 mb-10">*</span>
                    </label>
                    <select name="level" class="w-full form-input mb-2 @error('level') border border-red-500 @enderror"
                        id="level">
                        <option value=""></option>
                        <option value="بین المللی" {{ $scientificWork->level=='بین المللی'?'selected':'' }}>
                            بین المللی
                        </option>
                        <option value="ملی" {{ $scientificWork->level=='ملی'?'selected':'' }}>
                            ملی
                        </option>
                    </select>
                    @error('level')
                        <p class="text-red-500 font-semibold mb-1">{{ $message }}</p>
                    @enderror
                    <label for="dicribesion" class="block text-gray-700 mb-3"><span>توضیحات</span>
                        <span class="text-red-500 ">*</span>
                    </label>
                    <textarea class="text-right resize-none w-full form-input mb-2 @error('dicribesion') border border-red-500 @enderror"
                        id="dicribesion" name="dicribesion" value="{{ $scientificWork->dicribesion }}">
                        {{ $scientificWork->dicribesion }}
                    </textarea>

                    @error('dicribesion')
                        <p class="text-red-500 font-semibold mb-1">{{ $message }}</p>
                    @enderror


                    <label for="relase_date" class="block text-gray-700 mb-3"><span>تاریخ نشر</span>
                        <span class="text-red-500 mb-10">*</span>
                    </label>
                    <input type="date" class="w-full form-input mb-2 @error('relase_date') border border-red-500 @enderror"
                        id="relase_date" name="relase_date" value="{{ $scientificWork->relase_date }}">

                    @error('relase_date')
                        <p class="text-red-500 font-semibold mb-1">{{ $message }}</p>
                    @enderror

                    <label for="duration" class="block text-gray-700 mb-3"><span>مدت زمان که دربر گرفت</span>

                    </label>
                    <input type="text" class="w-full form-input mb-2 @error('duration') border border-red-500 @enderror"
                        id="duration" name="duration" value="{{ $scientificWork->duration }}">

                    @error('duration')
                        <p class="text-red-500 font-semibold mb-1">{{ $message }}</p>
                    @enderror

                    <label for="cover_photo" class="block text-gray-700 mb-3"><span>عکس </span>

                    </label>
                    <input type="file" class="w-full form-input mb-2 @error('cover_photo') border border-red-500 @enderror"
                        id="cover_photo" name="cover_photo" value="{{ $scientificWork->cover_photo }}">

                    @error('cover_photo')
                        <p class="text-red-500 font-semibold mb-1">{{ $message }}</p>
                    @enderror


                    <label for="work_url" class="block text-gray-700 mb-3"><span>نشانه سایت که آن بنشر شده یا url</span>

                    </label>
                    <input type="text" class="w-full form-input mb-2 @error('work_url') border border-red-500 @enderror"
                        id="work_url" name="work_url" value="{{ $scientificWork->work_url }}">

                    @error('work_url')
                        <p class="text-red-500 font-semibold mb-1">{{ $message }}</p>
                    @enderror


                    <label for="file_work" class="block text-gray-700 mb-3"><span>آپلود فایل پی دی اف اثر</span>
                        <span class="text-red-500 mb-10">*</span>
                    </label>
                    <input type="file" class="w-full form-input mb-2 @error('file_work') border border-red-500 @enderror"
                        id="file_work" name="file_work">

                    @error('file_work')
                        <p class="text-red-500 font-semibold mb-1">{{ $message }}</p>
                    @enderror
                    <button class="bg-blue-500 hover:bg-blue-400 text-white p-3 rounded-lg mb-0">بروز رسانی کردن</button>
                </form>
            </div>
        </div>
    </div>
@endsection
