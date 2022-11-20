@extends('layouts.app')

@section('content')
    <div class="w-full px-1" x-data="
                {
                    notShowWhilePrint:true,
                    showDeletingModel:'noen',
                    teacherCurrentJobDelete:false,
                    teacheEdictionInfoDelete:false,
                    teacherJobTraindDelete:false,
                    teacherLangSKillDelete:false,
                    teacherServiceDurationDelete:false,
                    teacherReviewDelete:false,
                    teacherRewardDelete:false,
                    selectedId:null
                }
            ">
        <button @focus="notShowWhilePrint = false"
            class="bg-blue-900 text-white bottom-0 right-0  py-2 px-4 rounded-full shadow-2xl hover:text-yellow-600 focus:outline-none"
            onclick="printArea()">print</button>
        <input type="hidden" x-bind:value="selectedId">
        <div id="AreaToBePrint">

            <div class="">
                <div class="mt-3 ">
                    <div class="w-full mt-2 rounded shadow-2xl bg-gray-200 text-center">
                        @include('components.totats')
                        <p class="text-blue-700 text-bold font-bold p-2">
                            شهرت استاد
                        </p>
                        <div class="rounded bg-white">
                            <div class="flex flex-col">
                                <div class=" overflow-x-auto">
                                    <p>
                                        <img class="roundImage mx-auto"
                                            src="{{ asset('asset/upload/image') }}/{{ $user->image }}" alt="">
                                    </p>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <p class="p-1">
                                                <span class="font-bold">نام : </span> <span
                                                    class=" mx-2">{{ $user->name }}</span>
                                            </p>
                                            {{-- <h1>need some checking</h1> --}}
                                            <p class="p-1">
                                                <span class="font-bold">تخلص : </span> <span
                                                    class=" mx-2">{{ $user->lname }}</span>
                                            </p>
                                            <p class="p-1">
                                                <span class="font-bold">اسم پدر : </span> <span
                                                    class=" mx-2">{{ $user->teacherInfo->fname ?? '' }}</span>
                                            </p>
                                            <p class="p-1">
                                                <span class="font-bold">سال تولد : </span> <span
                                                    class=" mx-2">{{ $user->teacherInfo->dob ?? '' }}</span>
                                            </p>
                                            <p class="p-1">
                                                <span class="font-bold"> تاریخ قبولیت : <span>
                                                        <span
                                                            class="mx-2">{{ $user->teacherInfo->accpet_date ?? '' }}</span>
                                            </p>
                                        </div>
                                        <div>
                                            <p class="p-1">
                                                <span class="font-bold">محل تولد : </span> <span
                                                    class=" mx-2">{{ $user->teacherInfo->birthPlace ?? '' }}</span>
                                            </p>
                                            <p class="p-1">
                                                <span class="font-bold"> نمبر تذکره : </span> <span
                                                    class=" mx-2">{{ $user->teacherInfo->Nid ?? '' }}</span>
                                            </p>
                                            <p class="p-1">
                                                <span class="font-bold"> شماره تماس : </span> <span
                                                    class=" mx-2">{{ $user->teacherInfo->phone ?? '' }}</span>
                                            </p>
                                            <p class="p-1">
                                                <span class="font-bold">ایمیل آدرس : </span>
                                                <span class=" mx-2">{{ $user->email }}</span>
                                            </p>
                                            <p class="p-1">
                                                <span class="font-bold">دیپارتمنت:</span>
                                                <span class=" mx-2">
                                                    @if ($user->teacherInfo->departmentOfTeacher !== null)
                                                        {{ $user->teacherInfo->departmentOfTeacher->department->name ?? '' }}
                                                    @endif
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    {{-- <div
                                        class="align-middle inline-block min-w-full shadow-2xl overflow-hidden sm:rounded-lg border-b ">
                                        <table class="min-w-full">
                                            <thead class="font-bold">
                                                <tr class="text-right">

                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b  0 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        اسم

                                                    </th>
                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        تحلض

                                                    </th>
                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        نام پدر

                                                    </th>
                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        تماس

                                                    </th>
                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        ایمیل

                                                    </th>
                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        دیپارتمنت

                                                    </th>
                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        تاریخ تولد

                                                    </th>
                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        محل تولد

                                                    </th>
                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        تذکره

                                                    </th>
                                                    <th
                                                        class="font-bold text-right px-6 py-3 border-b text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        تاریخ قبولیت

                                                    </th>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->lname }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->teacherInfo->fname }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->teacherInfo->phone }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->teacherInfo->department->name }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->teacherInfo->dob }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->teacherInfo->birthPlace }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->teacherInfo->Nid }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b  text-sm leading-5 font-semibold text-gray-900">
                                                        {{ $user->teacherInfo->accpet_date }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="">
                <div class="w-full mt-2 rounded shadow-2xl bg-gray-200 text-center">
                    <p class="text-blue-700 text-bold p-2">
                        بیوگرافی
                    </p>
                    <hr>
                    <div class="text-right bg-white p-4  ">
                        <h4 class="mb-3 text-sm font-bold tracking-tight text-success">working with for loop in alpine js
                        </h4>
                        <ul role="list" class="p-6 divide-y       divide-gray-200 text-gray-800">
                            <template x-for="person in people" :key="person.id">
                                <li class="flex py-4 first:pt-0 last:pb-0">
                                    <img :src="person.image" class="h-10 w-10 rounded-full" alt="">

                                    <div class="ml-3 overflow-hidden">
                                        <p x-text="person.email"
                                            class="text-sm font-medium text-sm font-medium text-orange-900">

                                        </p>
                                        <p x-text="person.name" class="text-sm ">

                                        </p>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <div class="w-full mt-2 rounded shadow-2xl bg-gray-200 text-center ">
                <div class="grid grid-cols-2 gap-1">
                    <p class="text-blue-700 text-bold p-2">
                        وظیفه فعلی
                    </p>
                    <a x-show=" notShowWhilePrint" href="{{ route('teacherCurrentJob.create', $user->teacherInfo->id ?? '') }}"
                        class="text-green-500 rounded-lg">ثبت کردن</a>
                </div>
                <hr>
                <div class="text-right bg-white p-4 overflow-x-auto ">
                    <div
                        class="align-middle inline-block min-w-full shadow-2xl overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead class="font-bold">
                                <tr class="text-right">
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        #
                                    </th>

                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        ریاست/وزارت
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        ریاست/آمریت
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        عنوان وظیفه
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        بست
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        موقق وظیفوی
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        تاریخ شمولیت در وظیفه
                                    </th>

                                    <th x-show="notShowWhilePrint"
                                        class=" notShowWhilePrint font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        عملیه
                                    </th>

                                </tr>
                            </thead>
                            @if ($user->isCompelete == 1)
                                @forelse ($user->teacherInfo->teacherCurrentJob as $teacherCurrentJob)
                                    <tbody class="bg-white">


                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherCurrentJob->id }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherCurrentJob->minstry }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherCurrentJob->departement }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherCurrentJob->job_title }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherCurrentJob->position }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherCurrentJob->jop_posistion }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherCurrentJob->reg_date }}
                                            </td>
                                            <td x-show="notShowWhilePrint"
                                                class="notShowWhilePrint px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                <a href="{{ route('teacherCurrentJob.edit', $teacherCurrentJob->id) }}"
                                                    class="bg-green-500 hover:bg-green-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button
                                                    @click="showDeletingModel= 'display:block' ; teacherCurrentJobDelete = true"
                                                    @focus="selectedId = {{ $teacherCurrentJob->id }}"
                                                    class="m-1 bg-red-500 hover:bg-red-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-trash m-1"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                @empty
                                @endforelse
                            @endif


                        </table>
                    </div>
                </div>

            </div>
            <div class="w-full mt-2 rounded shadow-2xl bg-gray-200 text-center">
                <p class="text-blue-700 text-bold p-2">
                    معلومات تحصلی
                </p>
                <hr>
                <div class="text-right bg-white p-4   overflow-x-auto">
                    @if ($user->isCompelete == 1)
                        @if ($user->teacherInfo->teacheEdictionInfo)
                            <div
                                class="align-middle inline-block min-w-full shadow-2xl  sm:rounded-lg border-b border-gray-200">
                                <table class="min-w-full">
                                    <thead class="font-bold">
                                        <tr class="text-right">
                                            <th
                                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                محل تحصیل/کشور
                                            </th>
                                            <th
                                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                موسسه آموزشی
                                            </th>
                                            <th
                                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                پوهنحی
                                            </th>

                                            <th
                                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                درجه تحصیل
                                            </th>
                                            <th
                                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                رشته تحصیلی
                                            </th>

                                            <th
                                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                تاریح شروع
                                            </th>
                                            <th
                                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                تاریح ختم
                                            </th>
                                            <th x-show="notShowWhilePrint"
                                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                عملیه
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $user->teacherInfo->teacheEdictionInfo->ed_place }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $user->teacherInfo->teacheEdictionInfo->ed_center_name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $user->teacherInfo->teacheEdictionInfo->eduDegree }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $user->teacherInfo->teacheEdictionInfo->collage }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $user->teacherInfo->teacheEdictionInfo->ed_faild }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $user->teacherInfo->teacheEdictionInfo->started_date }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $user->teacherInfo->teacheEdictionInfo->end_date }}
                                            </td>
                                            <td x-show="notShowWhilePrint"
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                <a href="{{ route('teacherEducationInfo.edit', $user->teacherInfo->teacheEdictionInfo->id) }}"
                                                    class="bg-green-500 hover:bg-green-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button @click="showDeletingModel = 'display:block' ;
                                                        teacheEdictionInfoDelete=true"
                                                    @focus="selectedId = {{ $user->teacherInfo->teacheEdictionInfo->id }}"
                                                    class="m-1 bg-red-500 hover:bg-red-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-trash m-1"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <a href="{{ route('teacherEducationInfo.create', $user->teacherInfo->id) }}"
                                class="rounded-lg p-3 bg-green-600 hover:bg-green-400 text-white">
                                ثبت کردن
                            </a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="w-full mt-2 rounded shadow-2xl bg-gray-200 text-center">
                <div class="grid grid-cols-2 gap-1">
                    <p class="text-blue-700 text-bold p-2">
                        آموزش های مسلکی مربوط به وظیفه
                    </p>
                    @if ($user->isCompelete == 1)
                        <a x-show="notShowWhilePrint" href="{{ route('teacherJobTrained.create', $user->teacherInfo->id) }}"
                            class="text-green-700">
                            ثبت کردن
                        </a>
                    @endif
                </div>

                <div class="text-right bg-white p-4  ">
                    <div class="text-right bg-white p-4   overflow-x-auto">
                        <div
                            class="align-middle inline-block min-w-full shadow-2xl  sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="font-bold">
                                    <tr class="text-right">

                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            کشور
                                        </th>
                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            موسسه آموزشی
                                        </th>
                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            رشته آموزشی
                                        </th>

                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            مدت آموزشی
                                        </th>

                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            تاریح شروع
                                        </th>
                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            تاریح ختم
                                        </th>
                                        <th x-show="notShowWhilePrint"
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            عملیه
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @if ($user->isCompelete == 1)
                                        @forelse ($user->teacherInfo->teacherJobTraind as $teacherJobTraind)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherJobTraind->country }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherJobTraind->edu_center }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherJobTraind->edu_field }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherJobTraind->duration }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherJobTraind->start_date }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherJobTraind->end_date }}
                                                </td>

                                                <td x-show="notShowWhilePrint"
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    <a href="{{ route('teacherJobTrained.edit', $teacherJobTraind->id) }}"
                                                        class="bg-green-500 hover:bg-green-400 text-white px-2 py-2 rounded">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button
                                                        @click="showDeletingModel = 'display:block'; teacherJobTraindDelete= true"
                                                        @focus="selectedId= {{ $teacherJobTraind->id }}"
                                                        class="m-1 bg-red-500 hover:bg-red-400 text-white px-2 py-2 rounded">
                                                        <i class="fa fa-trash m-1"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-2 rounded shadow-2xl bg-gray-200 text-center">
                <div class="grid grid-cols-2 gap-1">
                    <p class="text-blue-700 text-bold p-2">
                        مهارت های در زیان بین المللی
                    </p>
                    @if ($user->isCompelete == 1)
                        <a x-show="notShowWhilePrint" href="{{ route('teacherLangSkill.create', $user->teacherInfo->id) }}"
                            class="text-green-700">ثبت
                            کردن</a>
                    @endif
                </div>
                <div class="text-right bg-white p-4  ">
                    <div class="text-right bg-white p-4   overflow-x-auto">
                        <div
                            class="align-middle inline-block min-w-full shadow-2xl  sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="font-bold">
                                    <tr class="text-right">

                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            زبان
                                        </th>
                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            خواندن
                                        </th>
                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            گفتن
                                        </th>
                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            نوشتن
                                        </th>

                                        <th x-show="notShowWhilePrint"
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            عملیه
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @if ($user->isCompelete == 1)
                                        @forelse ($user->teacherInfo->teacherLangSKill as $teacherLangSKill)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherLangSKill->lang_name }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherLangSKill->reading }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherLangSKill->speaking }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ $teacherLangSKill->writing }}
                                                </td>

                                                <td x-show="notShowWhilePrint"
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    <a href="{{ route('teacherLangSkill.edit', $teacherLangSKill->id) }}"
                                                        class="bg-green-500 hover:bg-green-400 text-white px-2 py-2 rounded">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button
                                                        @click=" showDeletingModel = 'display:block'; teacherLangSKillDelete= true"
                                                        @focus="selectedId= {{ $teacherLangSKill->id }}"
                                                        class="m-1 bg-red-500 hover:bg-red-400 text-white px-2 py-2 rounded">
                                                        <i class="fa fa-trash m-1"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full mt-2 rounded shadow-2xl bg-gray-200 text-center">
                <div class="grid grid-cols-2 gap-1">
                    <p class="text-blue-700 text-bold p-2">
                        اداور خدمت
                    </p>
                    @if ($user->isCompelete == 1)
                        <a x-show="notShowWhilePrint" href="{{ route('teacherServiceDuration.create', $user->teacherInfo->id) }}"
                            class="text-green-700">ثبت
                            کردن</a>
                    @endif
                </div>
                <div class="text-right bg-white p-4   overflow-x-auto">
                    <div class="align-middle inline-block min-w-full shadow-2xl  sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead class="font-bold">
                                <tr class="text-right">

                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        #
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        مدت خدمت الی اکنون
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        مدت خدمت در اداره موجود
                                    </th>


                                    <th x-shpw="notShowWhilePrint"
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        عملیه
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @if ($user->isCompelete == 1)
                                    @forelse ($user->teacherInfo->teacherServiceDuration as $teacherServiceDuration)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherServiceDuration->id }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherServiceDuration->durations }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherServiceDuration->duration_at }}
                                            </td>

                                            <td x-show="notShowWhilePrint"
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                <a href="{{ route('teacherServiceDuration.edit', $teacherServiceDuration->id) }}"
                                                    class="bg-green-500 hover:bg-green-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button
                                                    @click=" showDeletingModel = 'display:block';
                                                    teacherServiceDurationDelete= true; selectedId = {{ $teacherServiceDuration->id }}"
                                                    class="m-1 bg-red-500 hover:bg-red-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-trash m-1">k</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full mt-2 rounded shadow-2xl bg-gray-200 text-center">
                <div class="grid grid-cols-2 gap-1">
                    <p class="text-blue-700 text-bold p-2">
                        معلومات ارزیابی اجرات
                    </p>
                    @if ($user->isCompelete == 1)
                        <a x-show="notShowWhilePrint" href="{{ route('teacherReview.create', $user->teacherInfo->id) }}" class="text-green-700">ثبت
                            کردن</a>
                    @endif
                </div>

                <div class="text-right bg-white p-4   overflow-x-auto">
                    <div class="align-middle inline-block min-w-full shadow-2xl  sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead class="font-bold">
                                <tr class="text-right">

                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        #
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        رتبه علمی
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        تاریخ ترفیع
                                    </th>


                                    <th x-show="notShowWhilePrint"
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        عملیه
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @if ($user->isCompelete == 1)
                                    @forelse ($user->teacherInfo->teacherReview as $teacherReview)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReview->id }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReview->edu_degree }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReview->upgrade_date }}
                                            </td>

                                            <td x-show="notShowWhilePrint"
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                <a href="{{ route('teacherReview.edit', $teacherReview->id) }}"
                                                    class="bg-green-500 hover:bg-green-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button
                                                    @click=" showDeletingModel = 'display:block';teacherReviewDelete=true; selectedId= {{ $teacherReview->id }}"
                                                    class="m-1 bg-red-500 hover:bg-red-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-trash m-1"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full mt-2 rounded shadow-2xl bg-gray-200 text-center">
                <div class="grid grid-cols-2 gap-1">
                    <p class="text-blue-700 text-bold p-2">
                        مکافات و مجازات
                    </p>
                    @if ($user->isCompelete == 1)
                        <a href="{{ route('teacherReward.create', $user->teacherInfo->id) }}" class="text-green-600">ثبت
                            کردن</a>
                    @endif
                </div>
                <div class="text-right bg-white p-4   overflow-x-auto">
                    <div class="align-middle inline-block min-w-full shadow  sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead class="font-bold">
                                <tr class="text-right">

                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        #
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        نوع
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        مقام ذیصلاح
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        نوعیت
                                    </th>

                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        تارخ صدور
                                    </th>
                                    <th x-show="notShowWhilePrint"
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        عملیه
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @if ($user->isCompelete == 1)
                                    @forelse ($user->teacherInfo->teacherReward as $teacherReward)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReward->id }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReward->type }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReward->from_dep }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReward->reward_type }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReward->issue_date }}
                                            </td>


                                            <td x-show="notShowWhilePrint"
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                <a href="{{ route('teacherReward.edit', $teacherReward->id) }}"
                                                    class="bg-green-500 hover:bg-green-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button
                                                    @click=" showDeletingModel ='display:block';teacherRewardDelete=true;selectedId={{ $teacherReward->id }}"
                                                    class="m-1 bg-red-500 hover:bg-red-400 text-white px-2 py-2 rounded">
                                                    <i class="fa fa-trash m-1"></i>
                                                    </a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-dialog2" :style="showDeletingModel">
            <div class="modal-content2">
                <form action="{{ route('teacherCurrentJob.delete') }}" method="POST" x-show="teacherCurrentJobDelete">
                    <h2 class="bg-red-600 text-white p-2 mb-1 w-full rounded-lg">آيا حذف معلومات وظیفه فعلی استاد صورت
                        گیرد؟</h2>
                    @csrf
                    @method('delete')
                    <input hidden="text" x-bind:value="selectedId" name="teacherCurrentJobId">
                    <div class="block mt-2">
                        <button class="bg-red-500 rounded p-3 hover:bg-red-300 text-white" type="submit">حذف کردن</button>
                        <button class="bg-green-500 rounded p-3 hover:bg-green-300 text-white" type="button"
                            @click="showDeletingModel= 'display:none';teacherCurrentJobDelete=false">انصراف کردن</button>
                    </div>
                </form>

                <form action="{{ route('teacheEdictionInfo.delete') }}" method="POST" x-show="teacheEdictionInfoDelete">
                    <h2 class="bg-red-600 text-white p-2 mb-1 w-full rounded-lg">آيا حذف معلومات تحصیلی استاد صورت گیرد؟
                    </h2>
                    @csrf
                    @method('delete')
                    <input hidden="text" x-bind:value="selectedId" name="teacheEdictionInfoId">
                    <div class="block mt-2">
                        <button class="bg-red-500 rounded p-3 hover:bg-red-300 text-white" type="submit">حذف کردن</button>
                        <button class="bg-green-500 rounded p-3 hover:bg-green-300 text-white" type="button"
                            @click="showDeletingModel= 'display:none';teacheEdictionInfoDelete=false">انصراف کردن</button>
                    </div>
                </form>

                <form action="{{ route('teacherJobTraind.delete') }}" method="POST" x-show="teacherJobTraindDelete">
                    <h2 class="bg-red-600 text-white p-2 mb-1 w-full rounded-lg">آيا حذف معلومات آموزش های مسلکی مربوط به
                        وظیفه ی استاد صورت گیرد؟</h2>
                    @csrf
                    @method('delete')
                    <input hidden="text" x-bind:value="selectedId" name="teacherJobTraindId">
                    <div class="block mt-2">
                        <button class="bg-red-500 rounded p-3 hover:bg-red-300 text-white" type="submit">حذف کردن</button>
                        <button class="bg-green-500 rounded p-3 hover:bg-green-300 text-white" type="button"
                            @click="showDeletingModel= 'display:none';teacherJobTraindDelete=false">انصراف کردن</button>
                    </div>
                </form>

                <form action="{{ route('teacherLangSKill.delete') }}" method="POST" x-show="teacherLangSKillDelete">
                    <h2 class="bg-red-600 text-white p-2 mb-1 w-full rounded-lg">آيا حذف معلومات مهارت های زیان بین المللی
                        استاد صورت گیرد؟</h2>
                    @csrf
                    @method('delete')
                    <input hidden="text" x-bind:value="selectedId" name="teacherLangSKillId">
                    <div class="block mt-2">
                        <button class="bg-red-500 rounded p-3 hover:bg-red-300 text-white" type="submit">حذف کردن</button>
                        <button class="bg-green-500 rounded p-3 hover:bg-green-300 text-white" type="button"
                            @click="showDeletingModel= 'display:none';teacherLangSKillDelete=false">انصراف کردن</button>
                    </div>
                </form>
                {{-- <input type="hidden" x-bind:value="selectedId"> --}}

                <form action="{{ route('teacherServiceDuration.delete') }}" method="POST"
                    x-show="teacherServiceDurationDelete">
                    <h2 class="bg-red-600 text-white p-2 mb-1 w-full rounded-lg">
                        {{-- آيا حذف معلومات مهارت های  زیان بین المللی  استاد صورت گیرد؟ --}}
                        اداور خدمت

                    </h2>
                    @csrf
                    @method('delete')
                    <input hidden="text" x-bind:value="selectedId" name="teacherServiceDurationId">
                    <div class="block mt-2">
                        <button class="bg-red-500 rounded p-3 hover:bg-red-300 text-white" type="submit">حذف کردن</button>
                        <button class="bg-green-500 rounded p-3 hover:bg-green-300 text-white" type="button"
                            @click="showDeletingModel= 'display:none';teacherServiceDurationDelete=false">انصراف
                            کردن</button>
                    </div>
                </form>

                <form action="{{ route('teacherReview.delete') }}" method="POST" x-show="teacherReviewDelete">
                    <h2 class="bg-red-600 text-white p-2 mb-1 w-full rounded-lg">
                        معلومات ارزیابی اجرات

                    </h2>
                    @csrf
                    @method('delete')
                    <input hidden="text" x-bind:value="selectedId" name="teacherReviewId">
                    <div class="block mt-2">
                        <button class="bg-red-500 rounded p-3 hover:bg-red-300 text-white" type="submit">حذف کردن</button>
                        <button class="bg-green-500 rounded p-3 hover:bg-green-300 text-white" type="button"
                            @click="showDeletingModel= 'display:none';teacherReviewDelete=false">انصراف
                            کردن</button>
                    </div>
                </form>
                {{-- <form action="{{ route('teacherLangSKill.delete') }}" method="POST"
                    x-show="teacherReviewDelete">
                    <h2 class="bg-red-600 text-white p-2 mb-1 w-full rounded-lg">
                      

                    </h2>
                    @csrf
                    @method('delete')
                    <input hidden="text" x-bind:value="selectedId" name="teacherServiceDurationId">
                    <div class="block mt-2">
                        <button class="bg-red-500 rounded p-3 hover:bg-red-300 text-white" type="submit">حذف کردن</button>
                        <button class="bg-green-500 rounded p-3 hover:bg-green-300 text-white" type="button"
                            @click="showDeletingModel= 'display:none';teacherReviewDelete=false">انصراف
                            کردن</button>
                    </div>
                </form> --}}

                <form action="{{ route('teacherReward.delete') }}" method="POST" x-show="teacherRewardDelete">
                    <h2 class="bg-red-600 text-white p-2 mb-1 w-full rounded-lg">
                        آيا حذف معلومات   مکافات و مجازات  استاد صورت گیرد؟

                    </h2>
                    @csrf
                    @method('delete')
                    <input hidden="text" x-bind:value="selectedId" name="teacherRewardId">
                    <div class="block mt-2">
                        <button class="bg-red-500 rounded p-3 hover:bg-red-300 text-white" type="submit">حذف کردن</button>
                        <button class="bg-green-500 rounded p-3 hover:bg-green-300 text-white" type="button"
                            @click="showDeletingModel= 'display:none';teacherRewardDelete=false">انصراف
                            کردن</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
<script>
    function printArea() {
        const printContents = document.getElementById('AreaToBePrint').innerHTML;
        const originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
