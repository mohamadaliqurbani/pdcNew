<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @livewireStyles
    @livewireScripts

    @stack('styles')

</head>

<body>
    {{-- navbar --}}
    <header class=" bg-indigo-700 overflow-hidden">
        <nav class=" container  mx-auto flex  shadow-2xl items-center  mt-5 pb-5 navWidth100">
            {{-- <div class="py-1 sm:hidden mx-auto text-center  text-white">
                <a href="{{ route('login') }}" class="text-xl hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ">ورود به سیستم </a>
                <ul class="text-center" dir="rtl">
                    <li>
                        <a href="{{ route('public.allScientificWork') }}" class="hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ">آثار علمی استادان و کارمندان</a>
                    </li>
                    <li>
                        <a href="{{ route('public.workshop.index') }}" class="hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ">ورکشاپ ها</a>
                    </li>
                    <li>
                        <a href="{{ route('landing') }}" class="hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ">صفحه اصلی</a>
                    </li>
                </ul>
            </div> --}}
            <div class="  sm:block text-white ">
                <a href="{{ route('landing') }}"
                    class="text-xl hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ">
                    <img src="{{ asset('images/pdc.jpg') }}" alt="" class="roundedImage">
                </a>
                <a href="{{ route('login') }}"
                    class="text-xl hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ">ورود
                    به سیستم </a>
            </div>
            <ul class="flex flex-1 justify-end text-white text-sx  gap-12  items-center " id="publicHeader">
                <li>
                    <a href="{{ route('public.allScientificWork') }}"
                        class="hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ">آثار
                        علمی استادان و کارمندان</a>
                </li>
                <li>
                    <a href="{{ route('public.workshop.index') }}"
                        class="hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ">ورکشاپ
                        ها</a>
                </li>
                <li>
                    <a href="{{ route('landing') }}"
                        class="hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ">صفحه
                        اصلی</a>
                </li>
            </ul>

        </nav>
    </header>
    {{-- <script>
        var publicHeader=document.getElementById('publicHeader');
        function showHeaderLinks(){
            publicHeader.style='display:block';
        }
    </script> --}}
