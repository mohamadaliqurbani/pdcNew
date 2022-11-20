@extends('layouts.app')

@section('content')
        <div class="w-full  mr-1 px-28  ">
            <div class="">
                <div class="w-full mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
                    <p class="text-blue-700 text-bold p-2">
                        تکمیل کردن معلومات
                    </p>
                    <hr>
                    <div class="px-6 py-8 bg-white rounded">
                        <form action="{{ route('teacherInfo.store',$user->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-2 gap-2">
    
                                <div class="p-2">
                                    <div class="flex flex-wrap">
                                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('اسم پدر') }}:
                                        </label>
    
                                        <input id="fname" type="text"
                                            class="form-input w-full @error('fname')  border-red-500 @enderror" name="fname"
                                            value="{{ old('fname') }}" required autocomplete="fname" autofocus>
    
                                        @error('fname')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
    
                                    <div class="flex flex-wrap">
                                        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('شماره تماس') }}:
                                        </label>
    
                                        <input id="phone" type="text"
                                            class="form-input w-full @error('phone')  border-red-500 @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone" autofocus>
    
                                        @error('phone')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
    
                                    <div class="flex flex-wrap">
                                        <label for="dob" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('تاریخ تولد') }}:
                                        </label>
    
                                        <input id="dob" type="date"
                                            class="form-input w-full @error('dob') border-red-500 @enderror" name="dob"
                                            value="{{ old('dob') }}" required autocomplete="dob">
    
                                        @error('dob')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="flex flex-wrap">
                                        <label for="birthPlace" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('محل تولد') }}:
                                        </label>
    
                                        <input id="birthPlace" type="text"
                                            class="form-input w-full @error('birthPlace')  border-red-500 @enderror"
                                            name="birthPlace" value="{{ old('birthPlace') }}" required
                                            autocomplete="birthPlace" autofocus>
    
                                        @error('birthPlace')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="flex flex-wrap">
                                        <label for="Nid" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('شماره تذکره') }}:
                                        </label>
    
                                        <input id="Nid" type="Nid"
                                            class="form-input w-full @error('Nid') border-red-500 @enderror" name="Nid"
                                            value="{{ old('Nid') }}"
                                            required>
    
                                        @error('password')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
    
                                    <div class="flex flex-wrap">
                                        <label for="accpet_date" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('تاریخ قبولیت') }}:
                                        </label>
    
                                        <input id="accpet_date" type="date"
                                            class="form-input w-full @error('accpet_date') border-red-500 @enderror"
                                            name="accpet_date" required>
    
                                        @error('accpet_date')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
    
                                    <div class="flex flex-wrap">
                                        <label for="department_id" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('دیپارتمنت') }}:
                                        </label>
                                        
                                        <select name="department_id" id="department_id"
                                            class="form-input w-full @error('department_id') border-red-500 @enderror"
                                            name="accpet_date" required>
                                            <option value="">دیپارتمنت را انتخاب نماید</option>
                                            @foreach ($departments as $depatment)
                                                <option value="{{ $depatment->id }}">{{ $depatment->name }}</option>
                                            @endforeach
                                        </select>
    
                                        @error('department_id')
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
