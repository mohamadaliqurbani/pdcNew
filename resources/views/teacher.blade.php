@extends('layouts.app')

@section('content')
    <div class="w-full ">

        <div class=" rounded-lg py-5 px-4 section-title w-4/5 mx-auto">
            <p class="text-blue-500 font-semibold">
                استاد معزز به سیستم  انکشاف مسلکی خوش آمدید.
            </p>
            <h2 class="font-extrabold text-3xl">معلومات اولیه شخصی.</h2>
        </div>

        <div class="w-4/5 mx-auto shadow-2xl">
            <div class="bg-purple-100 rounded">
                <div class="py-2">
                    <img src="{{ asset('asset/upload/image') }}/{{ auth()->user()->image }}"
                        alt="{{ auth()->user()->name }} - image" class="roundImage mx-auto ">
                    <div class="pt-2 text-center">
                        <span class="font-bold">{{ auth()->user()->name }} </span>
                        <span class="font-bold mx-2">{{ auth()->user()->lname }}</span>
                    </div>
                </div>
                <div class="bg-white p-3 overscroll-x-auto">
                    <div class="grid md:grid-cols-2 gap-2 grid-cols-1 gap-0">
                        <div>
                            <p class="p-1">
                                <span class="font-bold">نام : </span> <span
                                    class=" mx-2 ">{{ auth()->user()->name }}</span>
                            </p>
                            {{-- <h1>need some checking</h1> --}}
                            <p class="p-1">
                                <span class="font-bold">تخلص : </span> <span
                                    class=" mx-2 ">{{ auth()->user()->lname }}</span>
                            </p>
                            <p class="p-1">
                                <span class="font-bold">اسم پدر : </span> <span
                                    class=" mx-2 ">{{ auth()->user()->teacherInfo->fname ?? '' }}</span>
                            </p>
                            <p class="p-1">
                                <span class="font-bold">سال تولد : </span> <span
                                    class=" mx-2 ">{{ auth()->user()->teacherInfo->dob ?? '' }}</span>
                            </p>
                        </div>
                        <div>
                            <p class="p-1">
                                <span class="font-bold">محل تولد : </span> <span
                                    class=" mx-2 ">{{ auth()->user()->teacherInfo->birthPlace ?? '' }}</span>
                            </p>
                            <p class="p-1">
                                <span class="font-bold"> نمبر تذکره : </span> <span
                                    class=" mx-2 ">{{ auth()->user()->teacherInfo->Nid ?? '' }}</span>
                            </p>
                            <p class="p-1">
                                <span class="font-bold"> شماره تماس : </span> <span
                                    class=" mx-2 ">{{ auth()->user()->teacherInfo->phone ?? '' }}</span>
                            </p>
                            <p class="p-1">
                                <span class="font-bold">ایمیل آدرس : </span> <span
                                    class=" mx-2 ">{{ auth()->user()->email }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4/5 mx-auto shadow-2xl bg-purple-100 mt-2 rounded-lg">
            <div class="section-title">
                <h2 class="text-blue-500 text-2xl mx-2">
                    مکافات و مجازات
                </h2>
                <div class="text-right bg-white p-4   overflow-x-auto">
                    <div class="align-middle inline-block min-w-full ">
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

                                </tr>
                            </thead>
                            @if (auth()->user()->isCompelete == 1)
                                <tbody class="bg-white">
                                    @forelse (auth()->user()->teacherInfo->teacherReward as $teacherReward)
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
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4/5 mx-auto shadow-2xl bg-purple-100 mt-2 rounded-lg">
            <div class="section-title">
                <h2 class="text-blue-500 text-2xl mx-2">
                    معلومات ارزیابی اجرات
                </h2>
                <div class="text-right bg-white p-4   overflow-x-auto">
                    <div class="align-middle inline-block min-w-full ">
                        <table class="min-w-full">
                            <thead class="font-bold">
                                <tr class="text-right">
                                    <th
                                        class="font-bold text-right px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        رتبه علمی
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        تاریخ ترفیع
                                    </th>

                                </tr>
                            </thead>
                            @if (auth()->user()->isCompelete == 1)
                                <tbody class="bg-white">
                                    @forelse (auth()->user()->teacherInfo->teacherReview as $teacherReview)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReview->edu_degree }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherReview->upgrade_date }}
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class=" overflow-x-auto  w-4/5 mx-auto shadow-2xl  bg-purple-100 mt-2 rounded-lg ">
            <div class="section-title">
                <h2 class="text-blue-500 text-2xl mx-2">
                    معلومات وظیفه فعلی
                </h2>
                <div class="bg-white ">
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg">
                        <table class="min-w-full">
                            <thead class="font-bold">
                                <tr class="text-right">

                                    <th
                                        class="font-bold text-right px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        ریاست/وزارت
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        ریاست/آمریت
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        عنوان وظیفه
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        بست
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        موقق وظیفوی
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        تاریخ شمولیت در وظیفه
                                    </th>



                                </tr>
                            </thead>
                            @if (auth()->user()->isCompelete == 1)
                                @forelse (auth()->user()->teacherInfo->teacherCurrentJob as $teacherCurrentJob)
                                    <tbody class="bg-white">
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
                                                {{ $teacherCurrentJob->minstry }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
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
                                        </tr>
                                    </tbody>
                                @empty
                                @endforelse
                            @endif


                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4/5 mx-auto shadow-2xl  bg-purple-100 mt-2 rounded-lg">
            <div class="section-title">
                <h2 class="text-blue-500 text-2xl mx-2">
                    معلومات تحصیلی
                </h2>
                <div class="bg-white ">
                    <div class="text-right bg-white p-4   overflow-x-auto">
                        <div class="align-middle inline-block min-w-full">
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
                                            درجه
                                        </th>
                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            رشته
                                        </th>

                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            تاریح شروع
                                        </th>
                                        <th
                                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            تاریح ختم
                                        </th>

                                    </tr>
                                </thead>
                                @if (auth()->user()->isCompelete == 1)
                                    @if (auth()->user()->teacherInfo->teacheEdictionInfo)
                                        <tbody class="bg-white">
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ auth()->user()->teacherInfo->teacheEdictionInfo->ed_place }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ auth()->user()->teacherInfo->teacheEdictionInfo->ed_center_name }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ auth()->user()->teacherInfo->teacheEdictionInfo->eduDegree }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ auth()->user()->teacherInfo->teacheEdictionInfo->collage }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ auth()->user()->teacherInfo->teacheEdictionInfo->ed_faild }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ auth()->user()->teacherInfo->teacheEdictionInfo->started_date }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                    {{ auth()->user()->teacherInfo->teacheEdictionInfo->end_date }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endif
                                @endif

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4/5 mx-auto shadow-2xl  bg-purple-100 mt-2 rounded-lg">
            <div class="section-title">
                <h2 class="text-blue-500 text-2xl mx-2">
                    مهارت در زبان های بین المللی
                </h2>
                <div class="bg-white ">
                    <div class="align-middle inline-block min-w-full shadow  sm:rounded-lg border-b border-gray-200">
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
                                        نوشتن
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        گفتن
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @if (auth()->user()->isCompelete == 1)
                                    @forelse (auth()->user()->teacherInfo->teacherLangSKill as $teacherLangSKill)
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

        <div class="w-4/5 mx-auto shadow-2xl bg-purple-100 mt-2 rounded-lg">
            <div class="section-title">
                <h2 class="text-blue-500 text-2xl mx-2">
                    آموزش های مسلکی مربوط به وظیفه
                </h2>
                <div class="text-right bg-white p-4  ">
                    <div class="text-right bg-white p-4   overflow-x-auto">
                        <div class="align-middle inline-block min-w-full ">
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

                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @if (auth()->user()->isComplete == 1)
                                        @forelse (auth()->user()->teacherInfo->teacherJobTraind as $teacherJobTraind)
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
        </div>
    </div>
@endsection
