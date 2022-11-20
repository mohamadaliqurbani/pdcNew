@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        <div class="container mx-auto ">

            <div class=" mb-3 rounded-lg bg-purple-200 shadow-2xl overflow-x-auto text-wrap">
                <img src="{{ asset('asset/upload/image') }}/{{ $scientificWork->cover_photo ?: $scientificWork->scientificable->image }}"
                alt="" class="object-cover h-40 w-full rounded-t">
                {{-- scientificWork --}}
                <div class="px-2 py-2">
                    <header class="p-4 text-right">
                        <p class=" font-extrabold">عنوان اثر : <span>{{ $scientificWork->title }}</span></p>
                    </header>
                    {{-- content --}}
                    <div>
                        <p class="text-gray-900 mb-2">نوعیت اثر: <span>{{ $scientificWork->type }}</span></p>
                        <p class="text-gray-900 mb-2"> سطح اثر: <span>{{ $scientificWork->level }}</span></p>

                        <p class="">توضیحات : <span>{{ $scientificWork->dicribesion }}</span></p>
                        <p class="text-gray-900 font-semibold">تاریخ نشر : <span>{{ $scientificWork->relase_date }}</span>
                        </p>
                        <p class="text-gray-900 font-semibold"> در سایت که بنشر رسیده : <a
                                href="{{ $scientificWork->work_url }}"
                                class="text-blue-700 hover:text-blue-500">{{ $scientificWork->work_url }}</a></p>
                        <p class="mt-2 text-indigo-400">
                            <a href="{{ asset('asset/upload/pdfs') }}/{{ $scientificWork->file_work }}">دانلود اثر
                                <i class="fa fa-file-download"></i>
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
