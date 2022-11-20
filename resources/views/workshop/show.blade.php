@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        <div class="bg-purple-100 rounded-lg shadow-2x mb-2">
            <div class="section-title">
                <h2 class="px-5 py-2">معلومات در مورد ورکشاپ</h2>
            </div>
            <div class="bg-white p-2">

                <div class="bg-white p-2">
                    <div class="px-6 py-4" x-data="{message: ' Alpine js is very awesome i want to use this '}">

                        <h4 class="mb-5 text-xl font-semibold tracking-tight text-sky-600">
                            <span>عنوان : </span> {{ $workShop->title }}
                        </h4>
                        <p class="font-bold mt-2  mb-2 leading-normal text-sky-900 text-right">
                            <span>توضیحات : </span> {{ $workShop->description }}
                        </p>
                        <p class="mt-5">
                            <span class="text-blue-700">زمان ارایه</span> :
                            <span class="bg-green-400 text-white rounded">
                                {{ $workShop->present_time }}
                            </span>
                        </p>

                        <p class="mt-8">
                            <span class="text-blue-700">تاریخ ارایه</span> :
                            <span class="bg-indigo-900 text-white rounded">
                                {{ $workShop->present_date }}
                            </span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="bg-purple-100 rounded-lg shadow-2x overflow-x-auto">
            <div class="section-title">
                <h2 class="px-5 py-2">معلومات در مورد ارائه دهنده  ورکشاپ</h2>
                <div class="bg-white p-2 mt-3">
                    <div 
                    class="align-middle inline-block min-w-full  overflow-hidden ">
                    <table class="min-w-full ">
                        <thead class="font-bold">
                            <tr class="text-right">
                                <th
                                    class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    #
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    اسم
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    تحلض
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    دیپارتمنت
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                     معلومات
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($workShop->presentor as $presentor)

                                {{-- @foreach ($user->presentorable as $user) --}}
                                    
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                        {{ $presentor->presentorable->id }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $presentor->presentorable->user->name }}
    
                                    </td>
    
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $presentor->presentorable->user->lname }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $presentor->presentorable->user->teacherInfo!==null?$presentor->presentorable->user->teacherInfo->departmentOfTeacher->department->name :' '}}
                                    </td>
                                  
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                       <a href="{{ route('teacher.show',$presentor->presentorable->user) }}" class="bg-indigo-400 hover:bg-indigo-300 text-white rounded py-1 px-2 ">
                                           <i class="fa fa-eye"></i>
                                       </a>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-2 m-3">
    
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="bg-purple-100 rounded-lg shadow-2x overflow-x-auto mt-3">
            <div class="section-title">
                <h2 class="px-5 py-2">معلومات در مورد  اشتراک کننده  ورکشاپ</h2>
                <div class="bg-white p-2 mt-3">
                    <div 
                    class="align-middle inline-block min-w-full  overflow-hidden ">
                    <table class="min-w-full ">
                        <thead class="font-bold">
                            <tr class="text-right">
                                <th
                                    class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    #
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    اسم
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    تحلض
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    دیپارتمنت
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                     معلومات
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($workShop->participant as $participant)

                                {{-- @foreach ($user->presentorable as $user) --}}
                                    
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                        {{ $participant->user->id }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $participant->user->name }}
    
                                    </td>
    
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $participant->user->lname }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $participant->user->teacherInfo!==null?$participant->user->teacherInfo->departmentOfTeacher->department->name :'کارمند '}}
                                    </td>
                                  
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                       <a href="{{ route('teacher.show',$participant->user) }}" class="bg-indigo-400 hover:bg-indigo-300 text-white rounded py-1 px-2 ">
                                           <i class="fa fa-eye"></i>
                                       </a>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-2 m-3">
    
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
