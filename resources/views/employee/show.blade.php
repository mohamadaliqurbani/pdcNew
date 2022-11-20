@extends('layouts.app')

@section('content')
    <div class="overflow-x-auto rounded-lg mx-4 shadow-2xl  bg-purple-200 text-center hover:bg-sky-700 px-25">


        <div class=" justify-center   ">
            <div class="pt-1">
                <img class="roundImage mx-auto " src="{{ asset('asset/upload/image') }}/{{ $employee->user->image }}"
                alt="image" />
            </div>
                <div class="mx-auto">
                    <h1 class=" mb-5 mt-5 font-bold">{{ $employee->user->name }} {{ $employee->user->lname }}</h1>
                    <table class="w-full  ">
                        <thead class="font-bold px-15">
                         
                            <tr>
                                <th
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    اسم
                                </th>
                                <td
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    {{ $employee->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <th
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    تحلض
                                </th>
                                <td
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    {{ $employee->user->lname }}
                                </td>
                            </tr>
                            <tr>
                                <th
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    شماره تماس
                                </th>
                                <td
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    {{ $employee->emp_phone }}
                                </td>
                            </tr>
                            <tr>
                                <th
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                     میزان تحصیلات
                                </th>
                                <td
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    {{ $employee->education_degree }}
                                </td>
                            </tr>
                            <tr>
                                <th
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    بست وظیفوی
                                </th>
                                <td
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    {{ $employee->jop_posistion }}
                                </td>
                            </tr>
        
        
        
                            <tr>
                                <th
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    ایمیل
                                </th>
                                <td
                                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    {{ $employee->user->email }}
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <div class="m-3">
                        <a href="{{ route('employee.info.edit',$employee->id) }}"
                             class=" mb-2 float-right bg-green-500 text-white rounded p-3 hover:bg-green-400">
                            بروز رسانی
                        </a>
                    </div>
                </div>
        </div>
    </div>
@endsection
