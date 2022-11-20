@include('layouts.header')
<div class="w-full">
    <div class="grid lg:grid-cols-3 md:grid-cols-2">
        <div class="bgLogin md:col-span-1 lg:col-span-2 hidden md:flex lg:flex" ></div>
        <div class="bg-purple-200 vh100 w-full pt-10" dir="rtl">
            <div class="px-10">

                <header class="section-title text-lg">
                    <h2>سیستم مرکز انکشاف مسلکی .</h2>
                </header>
                <p class="text-lg font-semibold">ورود به سیستم</p>
            </div>
            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                @csrf
    
                <div class="flex flex-wrap">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('ایمیل آدرس') }}:
                    </label>
    
                    <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                    @error('email')
                        <p class="text-red-500  italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
    
                <div class="flex flex-wrap">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('رمز عبور') }}:
                    </label>
    
                    <input id="password" type="password"
                        class="form-input w-full @error('password') border-red-500 @enderror" name="password" required>
    
                    @error('password')
                        <p class="text-red-500  italic mt-4 text-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
    
    
                <div class="flex flex-wrap">
                    <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                        {{ __('ورود به سیستم') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
