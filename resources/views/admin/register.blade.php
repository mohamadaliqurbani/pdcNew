@extends('layouts.app')

@section('content')
    <div class="w-full  mr-1 px-28  ">
        <div class="bg-purple-100 rounded-lg">
            @include('components.totats')
            <h2 class="mx-4 pt-2 font-semibold"> ایجاد حساب کاربری برای ادمین</h2>
            <form class="bg-white px-5  rounded shadow-lg w-full 5 space-y-6  sm:space-y-8" enctype="multipart/form-data"
                method="POST" action="{{ route('register') }}">
                @csrf
    
                <div class="flex flex-wrap">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('اسم') }}:
                    </label>
    
                    <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
    
                <div class="flex flex-wrap">
                    <label for="lname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('تخلص') }}:
                    </label>
    
                    <input id="lname" type="text" class="form-input w-full @error('lname')  border-red-500 @enderror"
                        name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
    
                    @error('lname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                    <input type="hidden" name="role" value="admin">
                <div class="flex flex-wrap">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('ایمیل آدرس') }}:
                    </label>
    
                    <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
    
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
                        name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>
    
                    @error('image')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-wrap">
                    <label for="" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('جنیست') }}:
                    </label>
                    <label for="male" class="mr-4 block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('مرد') }}
                    </label>
                    <input id="male" type="radio" class="mr-2 @error('gender')  border-red-500 @enderror"
                        name="gender" value="مرد" required autocomplete="gender" autofocus>
    
                    <label for="female" class="mr-4 block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('زن') }}
                    </label>
                    <input id="female" type="radio" class="mr-2 @error('gender')  border-red-500 @enderror"
                        name="gender" value="زن" required autocomplete="gender" autofocus>
    
                    @error('gender')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-wrap">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('رمز کاربری') }}:
                    </label>
    
                    <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror"
                        name="password" required autocomplete="new-password">
    
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
    
                <div class="flex flex-wrap">
                    <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('تکرار رمز') }}:
                    </label>
    
                    <input id="password-confirm" type="password" class="form-input w-full" name="password_confirmation" required
                        autocomplete="new-password">
                </div>
    
                <div class="flex flex-wrap pb-2">
                    <button type="submit mb-2"
                        class="w-m select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-2">
                        {{ __('ایجاد حساب کاربری') }}
                    </button>
    
    
                </div>
            </form>
        </div>
    </div>
@endsection
