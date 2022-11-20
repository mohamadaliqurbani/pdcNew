@extends('layouts.app')

@section('content')
        <div class="w-full  mr-1 px-28  ">
            <div class="">
                <div class="w-full mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
                    <p class="text-blue-700 text-bold p-2">
                      بروز رسانی معلومات تحصلی  استاد
                    </p>
                    <hr>
                    <div class="px-6 py-8 bg-white rounded">
                        <form action="{{ route('teacherEducationInfo.update',$teacherEducationInfo->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="grid grid-cols-2 gap-2">
    
                                <div class="p-2">
                                    <div class="flex flex-wrap">
                                        <label for="ed_place" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __(' محل تحصیل/کشور') }}:
                                        </label>
    
                                        <input id="ed_place" type="text"
                                            class="form-input w-full @error('ed_place')  border-red-500 @enderror" name="ed_place"
                                            value="{{ $teacherEducationInfo->ed_place  }}" required autocomplete="ed_place" autofocus>
    
                                        @error('ed_place')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
    
                                    <div class="flex flex-wrap">
                                        <label for="ed_center_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('موسسه آموزشی') }}:
                                        </label>
    
                                        <input id="ed_center_name" type="text"
                                            class="form-input w-full @error('ed_center_name')  border-red-500 @enderror" name="ed_center_name"
                                            value="{{ $teacherEducationInfo->ed_center_name }}" required autocomplete="ed_center_name" autofocus>
    
                                        @error('ed_center_name')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    
                                    <div class="flex flex-wrap">
                                        <label for="eduDegree" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __(' پوهنحی') }}:
                                        </label>
    
                                        <input id="eduDegree" type="text"
                                            class="form-input w-full @error('eduDegree') border-red-500 @enderror" name="eduDegree"
                                            value="{{ $teacherEducationInfo->eduDegree }}" required autocomplete="eduDegree">
    
                                        @error('eduDegree')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    
                                    <div class="flex flex-wrap">
                                        <label for="collage" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('درجه تحصیل') }}:
                                        </label>
    
                                        <input id="collage" type="text"
                                            class="form-input w-full @error('collage')  border-red-500 @enderror"
                                            name="collage" value="{{ $teacherEducationInfo->collage }}" required
                                            autocomplete="collage" autofocus>
    
                                        @error('collage')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="flex flex-wrap">
                                        <label for="ed_faild" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __(' رشته تحصیلی') }}:
                                        </label>
    
                                        <input id="ed_faild" type="ed_faild"
                                            class="form-input w-full @error('ed_faild') border-red-500 @enderror" name="ed_faild"
                                            required value="{{ $teacherEducationInfo->ed_faild }}">
    
                                        @error('ed_faild')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
    
                                    <div class="flex flex-wrap">
                                        <label for="started_date" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __(' تاریح شروع') }}:
                                        </label>
    
                                        <input id="started_date" type="date"
                                            class="form-input w-full @error('started_date') border-red-500 @enderror"
                                            name="started_date" value="{{ $teacherEducationInfo->started_date }}" required>
    
                                        @error('started_date')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="flex flex-wrap">
                                        <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __(' تاریح ختم') }}:
                                        </label>
    
                                        <input id="end_date" type="date"
                                            class="form-input w-full @error('end_date') border-red-500 @enderror"
                                            name="end_date" value="{{ $teacherEducationInfo->end_date }}" required>
    
                                        @error('end_date')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            <div class="flex flex-wrap pb-2">
                                <button type="submit mb-2"
                                    class="w-m select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-2">
                                    {{ __('بروز رسانی کردن') }}
                                </button>
    
    
                            </div>
                        </form>

                    </div>
                </div>
            </div>
           
        </div>
@endsection
