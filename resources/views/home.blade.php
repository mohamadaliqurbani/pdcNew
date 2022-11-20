@extends('layouts.app')

@section('content')
    <div class="w-full ">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="lg:w-4/5 mx-auto">
            {{-- <section class=" break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg"> --}}

            <div class="bg-purple-100 rounded-lg shadow-2x">
                <header class="section-title mx-10 py-5">
                    <h2>داشبورد مدیریتی</h2>
                </header>
                <div class="grid lg:grid-cols-3 lg:gap-2 text-center md:grid-cols-1 px-4">
                    <div class="bg-purple-200 rounded-lg shadow-3xl w-full pt-5 mb-2 ">
                        <p class=" font-semibold  mb-3">
                            تعداد استاد
                        </p>
                        <div class="bg-white py-5">
                            {{ $allteachers }}
                        </div>
                    </div>
                    <div class="bg-purple-200 rounded-lg shadow-3xl w-full pt-5 mb-2">
                        <p class=" font-semibold mb-3">
                            تعداد کارمند
                        </p>
                        <div class="bg-white py-5">
                            {{ $allemployeeis }}
                        </div>
                    </div>
                    <div class="bg-purple-200 rounded-lg shadow-3xl w-full pt-5 mb-2">
                        <p class="font-semibold mb-3">
                            تعداد ورکشاپ ارایه شده
                        </p>
                        <div class="bg-white py-5">
                            {{ $workshops }}
                        </div>
                    </div>
                </div>
                <div class="bg-white">

                    @include('components.totats')
                  
                </div>
            </div>

            {{-- </section> --}}
            <div class="bg-purple-100 rounded-lg shadow-2xl mt-1">
                <header class="section-title">
                    <h2 class="mx-10 py-5"">معلومات کسی که ادمین میباشد</h2>
                </header>
                {{-- <img class="mx-auto roundImage" src="{{ asset('asset/upload/image') }}/{{ auth()->user()->image }}" alt=""> --}}
                <div class="bg-white p-3 overflow-hidden">
                    <div class="grid grid-cols-2 gap-1 ">
                        <div>
                            <img class="w-4/5 h-60 rounded" 
                                src="{{ asset('asset/upload/image') }}/{{ auth()->user()->image }}" alt="">
                        </div>
                        <div class="lg:mt-15">
                            <p class="p-1">
                                <span class="font-bold"> اسم : </span> <span
                                    class=" mx-2">{{ auth()->user()->name }}</span>
                            </p>
                            <p class="p-1">
                                <span class="font-bold"> تخلص : </span> <span
                                    class=" mx-2">{{ auth()->user()->lname }}</span>
                            </p>
                            <p class="p-1">
                                <span class="font-bold">ایمیل آدرس : </span> <span
                                    class=" mx-2">{{ auth()->user()->email }}</span>
                            </p>
                            <p class="p-1">
                                <span class="font-bold"> صلاحیت : </span> <span
                                    class=" mx-2">{{ auth()->user()->role }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="p-2 mt-5">
                        <a 
                      
                        href="{{ route('admin.account.edit',auth()->user()->id) }}" class="bg-green-500 p-3 rounded-lg text-white hover:bg-green-400" >بروز رسانی کردن</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
