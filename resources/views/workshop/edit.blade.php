@extends('layouts.app')

@section('content')
        <div class="w-full px-3">
            <div class="">
                <div class=" w-full  mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
                    
                    <p class="text-blue-700 text-bold p-2">
                        بروز رسانی معلومات ورکشاپ
                        {{ $workShop->id }}
                    </p>
                    <hr>
                    <div class=" bg-white rounded ">
                        <form action="{{ route('workshop.update',$workShop->id) }}" method="POST">
                            <div class="">
                                @csrf
                                @method('patch')
                                <div class="grid grid-cols-2 gap-2">

                                    <div class="p-2">
                                        <div class="flex flex-wrap">
                                            <label for="title"
                                                class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                                {{ __(' عنوان') }}:
                                            </label>

                                            <input id="title" type="text"
                                                class="form-input w-full @error('title')  border-red-500 @enderror"
                                                name="title" value="{{ $workShop->title }}" required
                                                autocomplete="title" autofocus>
                                            @error('title')
                                                <p class="text-red-500 text-xs italic mt-4">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-wrap">
                                            <label for="place"
                                                class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                                {{ __(' محل برگذاری') }}:
                                            </label>

                                            <input id="place" type="text"
                                                class="form-input w-full @error('place')  border-red-500 @enderror"
                                                name="place" value="{{ $workShop->place }}" required
                                                autocomplete="place" autofocus>
                                            @error('place')
                                                <p class="text-red-500 text-xs italic mt-4">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="flex flex-wrap">
                                            <label for="description"
                                                class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                                {{ __('توضیحات') }}:
                                            </label>

                                            
                                            <textarea name="description" class="form-input w-full @error('description')  border-red-500 @enderror">{{ $workShop->description }}</textarea>

                                            @error('description')
                                                <p class="text-red-500 text-xs italic mt-4">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        


                                    </div>
                                    <div class="p-2">
                                        <div class="flex flex-wrap">
                                            <label for="present_time"
                                                class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                                {{ __(' زمان برگذاری') }}:
                                            </label>

                                            <input id="present_time" type="time"
                                                class="form-input w-full @error('present_time')  border-red-500 @enderror"
                                                name="present_time" value="{{ $workShop->present_time }}" required
                                                autocomplete="present_time" autofocus>

                                            @error('present_time')
                                                <p class="text-red-500 text-xs italic mt-4">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-wrap">
                                            <label for="present_date"
                                                class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                                {{ __(' تاریخ برگذاری') }}:
                                            </label>

                                            <input id="present_date" type="date"
                                                class="form-input w-full @error('present_date') border-red-500 @enderror"
                                                name="present_date" required value="{{ $workShop->present_date }}">

                                            @error('present_date')
                                                <p class="text-red-500 text-xs italic mt-4">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <div class="flex flex-wrap pb-2 ">
                                    <button type="submit mb-2"
                                        class="w-m select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-2">
                                        {{ __('بروز رسانی کردن') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
@endsection
