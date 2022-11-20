@extends('layouts.app')

@section('content')
        <div class="w-full  mr-1 px-28  ">
            <div class="">
                <div class="w-full mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
                    <p class="text-blue-700 text-bold p-2">
                      بروز رسانی ادوار خدمت
                    </p>
                    <hr>

                    <div class="px-6 py-8 bg-white rounded">
                        <form action="{{ route('teacherServiceDuration.update',$teacherServicesDuration->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="p-2">
                               
                                <div class="flex flex-wrap">
                                    <label for="durations" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' مدت خدمت الی اکنون') }}:
                                    </label>
                                    <input id="durations" type="text"
                                        class="form-input w-full @error('durations')  border-red-500 @enderror" name="durations"
                                        value="{{ $teacherServicesDuration->durations  }}" required autocomplete="durations" autofocus>

                                    @error('durations')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
                                <div class="flex flex-wrap">
                                    <label for="مدت خدمت در اداره موجود" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('duration_at') }}:
                                    </label>
                                    <input id="duration_at" type="text"
                                        class="form-input w-full @error('duration_at')  border-red-500 @enderror" name="duration_at"
                                        value="{{ $teacherServicesDuration->duration_at  }}" required autocomplete="duration_at" autofocus>

                                    @error('duration_at')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
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
