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
    <style>
        .hide{
            display: none
        }
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dstyle_rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @livewireStyles
    @livewireScripts

    @stack('styles')
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}

</head>

<body class=" h-screen antialiased leading-none font-sans bg-gray-300 rtlDir">
    <div id="app" x-data="{'showAside': true,smallScreen:false}">
        {{-- <span x-show="showAside"> --}}
        @include('layouts.aside')
        {{-- </span> --}}
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 " href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 "
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <button class="mx-4 mt-1">
                            <i class="text-white   lg:block hidden   " @click="showAside = !showAside">
                                <span class="fa fa-bars "></span>
                            </i>
                            <i class="hidebar ">
                                <span class="fa fa-bars text-red-500" @click="show()"></span>
                            </i>
                        </button>

                      
                    @endguest
                </nav>
            </div>
        </header>
        {{-- :style="showAside ?'':'right:-250px' --}}


     
            <main class="sm:mt-1 "  :style=" showAside ?'':'padding-right:0 !important'" id="main">
            @yield('content')
            </main>

            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            @stack('scripts')
    </div>
    <script>
        var aside=document.getElementById('aside');
        var main = document.getElementById('main');
        var display=true;
        function show(){
            // show=true;
            if(display==true){
                aside.style='right:250px';
                display=false;
                // alert('show');

            }
            else{
                aside.style='right:0';
                // alert('!show');
                display=true;
            }
        }
    </script>
   
</body>

</html>
