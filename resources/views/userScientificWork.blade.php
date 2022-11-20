@include('layouts.header')

{{-- hero section --}}
<section class="relative">
    <div class=" shadow-2xl container mx-auto w-4/5 bg-purple-100 mt-5 rounded mb-5" dir="rtl">
        <div class="heading2 text-center ">
            <h2> نمایش معلومات کامل آثار علمی کاربر </h2>
        </div>
        <div class="bg-white p-5">
            <div class="grid grid-cols-2 gap-1 ">
                <div>
                    <img class="w-3/5" height="300px"
                        src="{{ asset('asset/upload/image') }}/{{ $user->image }}" alt="">
                </div>
                <div class="lg:mt-5">
                    <p class="p-1">
                        <span class="font-bold"> اسم : </span> <span
                            class=" mx-2">{{ $user->name }}</span>
                    </p>
                    <p class="p-1">
                        <span class="font-bold"> تخلص : </span> <span
                            class=" mx-2">{{ $user->lname }}</span>
                    </p>
                    <p class="p-1">
                        <span class="font-bold">ایمیل آدرس : </span> <span
                            class=" mx-2">{{ $user->email }}</span>
                    </p>

                    @if ($user->teacherInfo !== null and $user->teacherInfo->teacherEduDegree !== null)
                        <p class="p-1">
                            <span class="font-bold"> رتبه علمی : </span> <span
                                class=" mx-2">{{ $user->teacherInfo->teacherEduDegree->edu_degree }}</span>
                        </p>
                    @elseif($user->role == 'employee')
                        <p class="p-1">
                            <span class="font-bold"> رتبه علمی : </span> <span
                                class=" mx-2">{{ $user->employee->education_degree }}</span>
                        </p>
                    @endif
                    @if ($user->role == 'teacher' and $user->teacherInfo !== null and $user->teacherInfo->departmentOfTeacher !== null)
                        <p class="p-1">
                            <span class="font-bold">عضو دیپارتمنت : </span> <span
                                class=" mx-2">{{ $user->teacherInfo->departmentOfTeacher->department->name }}</span>
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>
<div dir="rtl" class="mb-4 mx-auto p-0 w-4/5 grid lg:grid-cols-2  md:grid-cols-3 gap-2  sm:grid-cols-1 mt-2 ">
    @forelse ($user->scientificWork as $scientificWork)
        <div class=" mb-3 rounded-lg bg-purple-200 shadow-2xl ">
            <img src="{{ asset('asset/upload/image') }}/{{ $scientificWork->cover_photo ?: $user->image }}"
                alt="" class="object-cover h-40 w-full rounded-t">
            <div class="">
                <header class="p-4 text-right">
                    <p class=" font-extrabold">عنوان اثر : <span>{{ $scientificWork->title }}</span></p>
                </header>
                {{-- content --}}
                <div>
                    <p class="text-gray-900 mb-2">نوعیت اثر: <span>{{ $scientificWork->type }}</span></p>
                    <p class="text-gray-900 mb-2"> سطح اثر: <span>{{ $scientificWork->level }}</span></p>

                    <p class="text-gray-900 mb-2">توضیحات : <span>{{ $scientificWork->dicribesion }}</span>
                    </p>
                    <p class="text-gray-900 font-semibold">تاریخ نشر :
                        <span>{{ $scientificWork->relase_date }}</span>
                    </p>
                    <p class="text-gray-900 font-semibold"> در سایت که بنشر رسیده : <a
                            href="{{ $scientificWork->work_url }}"
                            class="text-blue-700 hover:text-blue-500">{{ $scientificWork->work_url }}</a>
                    </p>

                    <p class="mt-2 text-indigo-400">
                        <a href="{{ asset('asset/upload/pdfs') }}/{{ $scientificWork->file_work }}">دانلود اثر
                            <i class="fa fa-file-download"></i>
                        </a>
                    </p>

                </div>

            </div>
        </div>
    @empty
        <div class="col-span-12 rounded-lg bg-purple-200 shadow-2xl p-10">
            <h1 class="font-extrabold text-blue-900">تا حالا هیچ اثری از طرف استاد
                ({{ $user->name }} <span class="mx-1">{{ $user->lname }}</span>)
                در این سیستم بثبت نرسیده</h1>
        </div>
    @endforelse
</div>
</body>

</html>
