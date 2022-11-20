@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        <div class=" w-full  shadow-xl rounded  bg-gray-200 text-center rounded">
            <p class="text-blue-700 text-bold p-2">
                ثبت معلومات کارمندان
            </p>
            <hr>
            <div class=" bg-white rounded ">
                <form action="{{ route('employee.info.update',$employee) }}" method="POST" enctype="multipart/form-data">
                    <div class="">
                        @csrf
                        @method('patch')
                        <div class="grid grid-cols-2 gap-2">

                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="education_degree"
                                        class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' میزان تحصیلات') }}:
                                    </label>

                                    <input id="education_degree" type="text"
                                        class="form-input w-full @error('education_degree')  border-red-500 @enderror"
                                        name="education_degree" value="{{ $employee->education_degree }}"  autocomplete="education_degree"
                                        autofocus>
                                    @error('education_degree')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                <div class="flex flex-wrap">
                                    <label for="jop_posistion"
                                        class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' بست وظیفوی') }}:
                                    </label>

                                    <input id="jop_posistion" type="text"
                                        class="form-input w-full @error('jop_posistion') border-red-500 @enderror"
                                        name="jop_posistion" value="{{ $employee->jop_posistion}}" 
                                        autocomplete="jop_posistion">

                                    @error('jop_posistion')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                            </div>
                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="emp_phone"
                                        class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('شماره تماس') }}:
                                    </label>

                                    <input id="emp_phone" type="text"
                                        class="form-input w-full @error('emp_phone')  border-red-500 @enderror"
                                        name="emp_phone" value="{{ $employee->emp_phone }}"  autocomplete="emp_phone"
                                        autofocus>

                                    @error('emp_phone')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                {{-- <div class="flex flex-wrap">
                                    <label for="emp_email"
                                        class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' ایمیل') }}:
                                    </label>

                                    <input id="emp_email" type="email"
                                        class="form-input w-full @error('emp_email') border-red-500 @enderror"
                                        name="emp_email"  value="{{ old('emp_email') }}">

                                    @error('emp_email')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div> --}}

                                {{-- <div class="flex flex-wrap">
                                    <label for="emp_image"
                                        class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' عکس') }}:
                                    </label>

                                    <input id="choseenImag" type="file" x-on:change="ifImgSelected=true"
                                        class="form-input w-full @error('emp_image')   border-red-500 @enderror"
                                        name="emp_image"  x-ref="image" wire:change="$emit('imageSelected')">

                                    @error('emp_image')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div> --}}
                            </div>


                        </div>
                        <div class="flex flex-wrap pb-2 ">
                            <button type="submit mb-2"
                                class="w-m select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-2">
                                {{ __('ثبت کردن') }}
                            </button>
                        </div>
                    </div>
                    <div class="">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
