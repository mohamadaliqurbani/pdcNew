@extends('layouts.app')

@section('content')
    <div class="w-full  mr-1 px-28  ">
        <div class="">
            <div class="w-full mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
                <p class="text-blue-700 text-bold p-2">
                    بروز رسانی معلمومات وظیفه فعلی استاد
                </p>
                <hr>
                <div class="px-6 py-8 bg-white rounded">
                    <form action="{{ route('teacherCurrentJob.update', $teacherCurrentJob->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="grid grid-cols-2 gap-2">

                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' ریاست/وزارت') }}:
                                    </label>

                                    <input id="minstry" type="text"
                                        class="form-input w-full @error('minstry')  border-red-500 @enderror" name="minstry"
                                        value="{{ $teacherCurrentJob->minstry }}" required autocomplete="minstry"
                                        autofocus>

                                    @error('minstry')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="departement"
                                        class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('ریاست/آمریت') }}:
                                    </label>

                                    <input id="departement" type="text"
                                        class="form-input w-full @error('departement')  border-red-500 @enderror"
                                        name="departement" value="{{ $teacherCurrentJob->departement }}" required
                                        autocomplete="departement" autofocus>

                                    @error('departement')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="job_title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('  عنوان وظیفه') }}:
                                    </label>

                                    <input id="job_title" type="text"
                                        class="form-input w-full @error('job_title') border-red-500 @enderror"
                                        name="job_title" value="{{ $teacherCurrentJob->job_title }}" required
                                        autocomplete="job_title">

                                    @error('job_title')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="position" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('بست') }}:
                                    </label>

                                    <input id="position" type="text"
                                        class="form-input w-full @error('position')  border-red-500 @enderror"
                                        name="position" value="{{ $teacherCurrentJob->position }}" required
                                        autocomplete="position" autofocus>

                                    @error('birthPlace')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="jop_posistion"
                                        class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' موقف وظیفوی') }}:
                                    </label>

                                    <input id="jop_posistion" type="jop_posistion"
                                        class="form-input w-full @error('jop_posistion') border-red-500 @enderror"
                                        name="jop_posistion" required value="{{ $teacherCurrentJob->jop_posistion }}">

                                    @error('jop_posistion')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="reg_date" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' تاریخ شمولیت در وظیفه') }}:
                                    </label>

                                    <input id="reg_date" type="date"
                                        class="form-input w-full @error('reg_date') border-red-500 @enderror"
                                        name="reg_date" value="{{ $teacherCurrentJob->reg_date }}" required>

                                    @error('reg_date')
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
                                {{ __('ثبت کردن') }}
                            </button>


                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
