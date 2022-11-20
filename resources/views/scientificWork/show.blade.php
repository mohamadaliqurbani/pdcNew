@extends('layouts.app')

@section('content')

    <div class="w-full px-3">
        <div class="container mx-auto grid lg:grid-cols-3 lg:gap-2 md:grid-cols-2 md:gap-1  sm:grid-cols-1">
            @forelse ($scientificworks as $scientificWork)
                <div class=" mb-3 rounded-lg bg-purple-200 shadow-2xl overscroll-x-auto">
                    <img src="{{ asset('asset/upload/image') }}/{{ $scientificWork->cover_photo? : $scientificWork->scientificable->image }}" alt=""
                     class="object-cover h-40 w-full rounded-t" >
                     <div class="px-2 py-2">
                        <header class="p-4 text-right">
                            <p class=" font-extrabold">عنوان اثر : <span>{{ $scientificWork->title }}</span></p>
                        </header>
                        {{-- content --}}
                        <div>
                            <p class="text-gray-900 mb-2">نوعیت اثر: <span>{{ $scientificWork->type }}</span></p>
                            <p class="text-gray-900 mb-2"> سطح اثر: <span>{{ $scientificWork->level }}</span></p>
    
                            {{-- <p class="text-gray-900 mb-2">توضیحات : <span>{{ $scientificWork->dicribesion }}</span></p> --}}
                            <p class="text-gray-900 font-semibold">تاریخ نشر : <span>{{ $scientificWork->relase_date }}</span></p>
                            <p class="text-gray-900 font-semibold"> در سایت که بنشر رسیده : <a href="{{ $scientificWork->work_url }}" class="text-blue-700 hover:text-blue-500">{{ $scientificWork->work_url }}</a></p>
                            <p class="mt-2 text-indigo-400">
                                <a href="{{ asset('asset/upload/pdfs') }}/{{ $scientificWork->file_work }}">دانلود اثر
                                    <i class="fa fa-file-download"></i>
                                </a>
                            </p>
                            <a href="{{ route('showScientificWork', $scientificWork->id) }}"
                                class="mt-2 block p-3 rounded-lg bg-indigo-400 text-white hover:bg-indigo-300">توضیحات </a>
                        </div>
                        
                    </div>
                </div>
            @empty
                <div class="col-span-12 rounded-lg bg-purple-200 shadow-2xl p-10">
                    <h1 class="font-extrabold text-blue-900">تا حالا هیچ اثری از طرف استاد
                        ({{ $user->name }} <span class="mx-1">{{ $user->lname }}</span>)
                        در این سیستم بثبت نرسیده</h1>
                </div>
            @endforelse
        </div>
    </div>
@endsection
