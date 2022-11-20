@extends('layouts.app')

@section('content')
        <div class="bg-purple-100 rounded-lg shadow-2xl  w-4/5 mx-auto   ">
            <h2 class="p-5 font-semibold">
                بروز رسانی بخش از معلومات حساب کاربری استاد
            </h2>
            <div class=" bg-white p-5">
                <form class=" " 
                enctype="multipart/form-data" method="POST" action="{{ route('teacher.update',$user->id) }}">
                    @csrf
                    @method('patch')
                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('اسم') }}:
                        </label>
    
                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                            name="name" value="{{$user->name }}" required autocomplete="name" autofocus>
    
                        @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
    
                    <div class="flex flex-wrap">
                        <label for="lname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('تحلض') }}:
                        </label>
    
                        <input id="lname" type="text" class="form-input w-full @error('lname')  border-red-500 @enderror"
                            name="lname" value="{{$user->lname }}" required autocomplete="lname" autofocus>
    
                        @error('lname')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
    
                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('ایمیل آدرس') }}:
                        </label>
    
                        <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror"
                            name="email" value="{{$user->email }}" required autocomplete="email">
    
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('عکس') }}:
                        </label>
    
                        <input id="image" type="file" class="form-input w-full @error('image')  border-red-500 @enderror"
                            name="image" value="{{$user->image }}"  autocomplete="image" autofocus>
    
                        @error('image')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
    
                    <div class="flex flex-wrap pb-2">
                        <button type="submit mb-2"
                            class="w-m select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-2">
                            {{ __('بروز رسانی') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
@endsection
