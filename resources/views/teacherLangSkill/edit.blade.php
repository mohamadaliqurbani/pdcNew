@extends('layouts.app')

@section('content')
    <div class="w-full  mr-1 px-28  ">
        <div class="">
            <div class="w-full mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
                <p class="text-blue-700 text-bold p-2">
                    بروز رسانی مهارت در زبان های بین المللی
                </p>
                <hr>
                <div class="px-6 py-8 bg-white rounded">
                    <form action="{{ route('teacherLangSkill.update', $teacherLangSkill->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="grid grid-cols-2 gap-2">

                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="lang_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('زبان') }}:
                                    </label>

                                    <input id="lang_name" type="text"
                                        class="form-input w-full @error('lang_name')  border-red-500 @enderror"
                                        name="lang_name" value="{{ $teacherLangSkill->lang_name }}" required
                                        autocomplete="lang_name" autofocus>

                                    @error('lang_name')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="reading" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('خواندن') }}:
                                    </label>

                                    <input id="reading" type="text"
                                        class="form-input w-full @error('reading')  border-red-500 @enderror" name="reading"
                                        value="{{ $teacherLangSkill->reading }}" required autocomplete="reading"
                                        autofocus>

                                    @error('reading')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                
                            </div>
                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="speaking" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' گفتن') }}:
                                    </label>

                                    <input id="speaking" type="text"
                                        class="form-input w-full @error('speaking') border-red-500 @enderror"
                                        name="speaking" value="{{ $teacherLangSkill->speaking }}" required
                                        autocomplete="speaking">

                                    @error('speaking')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="writing" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('نوشتن') }}:
                                    </label>

                                    <input id="writing" type="text"
                                        class="form-input w-full @error('writing')  border-red-500 @enderror" name="writing"
                                        value="{{ $teacherLangSkill->writing }}" required autocomplete="writing"
                                        autofocus>

                                    @error('writing')
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
