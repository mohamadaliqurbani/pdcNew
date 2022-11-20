@extends('layouts.app')

@section('content')
        <div class="w-full  mr-1 px-28  ">
            <div class="">
                <div class="w-full mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
                    <p class="text-blue-700 text-bold p-2">
                      ثبت  معلومات ارزیابی اجراآت
                    </p>
                    <hr>
                   
                    	

                    <div class="px-6 py-8 bg-white rounded">
                        <form action="{{ route('teacherReview.store',$teacherInfo->id) }}" method="POST">
                            @csrf
                            
                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="edu_degree" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('  رتبه علمی') }}:
                                    </label>
                                    <input id="edu_degree" type="text"
                                        class="form-input w-full @error('edu_degree')  border-red-500 @enderror" name="edu_degree"
                                        value="{{ old('edu_degree')  }}" required autocomplete="edu_degree" autofocus>

                                    @error('edu_degree')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap">
                                    <label for="upgrade_date" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' تاریخ ترفیع') }}:
                                    </label>

                                    <input id="upgrade_date" type="date"
                                        class="form-input w-full @error('upgrade_date') border-red-500 @enderror"
                                        name="upgrade_date" value="{{ $teacherInfo->upgrade_date }}" required>

                                    @error('upgrade_date')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="flex flex-wrap pb-2">
                                <button type="submit mb-2"
                                    class="w-m select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-2">
                                    {{ __('ثبت کردن') }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
           
        </div>
@endsection
