@extends('layouts.app')

@section('content')
    <div class="w-full  mr-1 px-28  ">
        <div class="">
            <div class="w-full mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
                <p class="text-blue-700 text-bold p-2">
                    ثبت آموزش های مسلکی مربوط به وظیفه استاد
                </p>
                <hr>
                <div class="px-6 py-8 bg-white rounded">
                    <form action="{{ route('teacherJobTrained.store', $teacherInfo->id) }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-2 gap-2">

                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="ed_place" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' کشور') }}:
                                    </label>
                                    <input id="country" type="text"
                                        class="form-input w-full @error('country')  border-red-500 @enderror" name="country"
                                        value="{{ old('country') }}" required autocomplete="country" autofocus>

                                    @error('country')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="edu_center" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('موسسه آموزشی') }}:
                                    </label>

                                    <input id="edu_center" type="text"
                                        class="form-input w-full @error('edu_center')  border-red-500 @enderror"
                                        name="edu_center" value="{{ old('edu_center') }}" required
                                        autocomplete="edu_center" autofocus>

                                    @error('edu_center')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="edu_field" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' رشته آموزشی') }}:
                                    </label>

                                    <input id="edu_field" type="text"
                                        class="form-input w-full @error('edu_field') border-red-500 @enderror"
                                        name="edu_field" value="{{ $teacherInfo->edu_field }}" required
                                        autocomplete="edu_field">

                                    @error('edu_field')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                             
                            </div>
                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="duration" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('مدت آموزشی') }}:
                                    </label>

                                    <input id="duration" type="text"
                                        class="form-input w-full @error('duration')  border-red-500 @enderror"
                                        name="duration" value="{{ $teacherInfo->duration }}" required
                                        autocomplete="duration" autofocus>

                                    @error('duration')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap">
                                    <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' تاریح شروع') }}:
                                    </label>

                                    <input id="start_date" type="date"
                                        class="form-input w-full @error('start_date') border-red-500 @enderror"
                                        name="start_date" value="{{ $teacherInfo->start_date }}" required>

                                    @error('start_date')
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
                                        name="end_date" value="{{ $teacherInfo->end_date }}" required>

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
                                {{ __('ثبت کردن') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
