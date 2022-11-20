@extends('layouts.app')

@section('content')
        <div class="w-full  mr-1 px-28  ">
            <div class="">
                <div class="w-full mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
                    <p class="text-blue-700 text-bold p-2">
                      بروز رسانی مکافات و مجازات
                    </p>
                    <hr>

                    <div class="px-6 py-8 bg-white rounded">
                        <form action="{{ route('teacherReward.update',$teacherReward->id) }}" method="POST">
                            @csrf
                            @method('patch')		
                            <div class="p-2">
                                <div class="flex flex-wrap">
                                    <label for="type" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('نوع') }}:
                                    </label>
                                    <input id="type" type="text"
                                        class="form-input w-full @error('type')  border-red-500 @enderror" name="type"
                                        value="{{ $teacherReward->type  }}" required autocomplete="type" autofocus>

                                    @error('type')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap">
                                    <label for="from_dep" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('مقام ذیصلاح') }}:
                                    </label>
                                    <input id="from_dep" type="text"
                                        class="form-input w-full @error('from_dep')  border-red-500 @enderror" name="from_dep"
                                        value="{{ $teacherReward->from_dep  }}" required autocomplete="from_dep" autofocus>

                                    @error('from_dep')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
                                <div class="flex flex-wrap">
                                    <label for="reward_type" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __('نوعیت') }}:
                                    </label>
                                    <input id="reward_type" type="text"
                                        class="form-input w-full @error('reward_type')  border-red-500 @enderror" name="reward_type"
                                        value="{{ $teacherReward->reward_type  }}" required autocomplete="reward_type" autofocus>

                                    @error('reward_type')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
                                <div class="flex flex-wrap">
                                    <label for="issue_date" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                        {{ __(' تارخ صدور') }}:
                                    </label>

                                    <input id="issue_date" type="date"
                                        class="form-input w-full @error('issue_date') border-red-500 @enderror"
                                        name="issue_date" value="{{ $teacherReward->issue_date }}" required>

                                    @error('issue_date')
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
