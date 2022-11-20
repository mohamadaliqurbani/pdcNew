@extends('layouts.app')
@section('content')
    <div class="w-full px-3">
       <div class="bg-purple-100 rounded-lg shadow-2xl">
           <div class="py-1">
               <img class="roundImage mx-auto  " src="{{ asset('asset/upload/outside') }}/{{ $outsidepresentor->image }}" alt="">
                <p class="m-5 text-center">
                   
                    <span>{{ $outsidepresentor->name  }}</span>
                    <span class="mx-1">{{ $outsidepresentor->lname  }}</span>
                </p>
            </div>
            <div class="bg-white p-10">
                <div class="grid grid-cols-2 gap-2 ">
                    <div>
                        <span class="font-bold">اسم : </span>
                        <span>{{ $outsidepresentor->name  }}</span>
                        <br>
                        <span class="font-bold">تخلص : </span>
                        <span >{{ $outsidepresentor->lname  }}</span>
                        
                        <br>
                        <span class="font-bold">ایمیل : </span>
                        <span {{ $outsidepresentor->email  }}</span>
                        <br>
                        <span class="font-bold"> معلومات مختصر در مورد ارایه دهد : </span>
                       <p>{{ $outsidepresentor->info }}</p>
                    </div>

                    <div>
                        <span class="font-bold">رشته تحصلی : </span>
                        <span>{{ $outsidepresentor->education  }}</span>
                        <br>
                        <span class="font-bold">جنسیت : </span>
                        <span>{{ $outsidepresentor->gender  }}</span>
                        
                        <br>
                        <span class="font-bold">شماره تماس : </span>
                        <span>{{ $outsidepresentor->phone  }}</span>
                        <br>
                        <span class="font-bold"> عنوان ورکشاپ : </span>
                        <span>{{ $outsidepresentor->workShop->title  }}</span>
                        
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection
