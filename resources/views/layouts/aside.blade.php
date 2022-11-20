<aside class="shadow shadow-2xl " :style="showAside ?'':'right:-250px'" id="aside">
    <div class="container text-center asideFex ">
        @auth

            <img src="{{ asset('asset/upload/image') }}/{{ auth()->user()->image }}" alt="sfjksd" class="mr-15">
            <p class="text-white mb-1"><b>{{ auth()->user()->name }}</b>

            @endauth
            <hr class="bg-white">
    </div>
    <nav x-data="{ showTeacherSections: false, showScientificWork: false, activeAccount: false, deActiveAccount: false, showEmployee: false }">
        <ul class="py-1 text-white ">
            @if (auth()->user()->role == 'admin' or auth()->user()->role == 'supperAdmin')
                <li>
                    <a href="{{ route('collage.index') }}"
                        class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">پوهنحی
                        ها</a>
                </li>
                <li>
                    <a href="{{ route('department.index') }}"
                        class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">دیپارتمنت</a>
                </li>
                <li>
                    <a href="/" @click.prevent="showTeacherSections =! showTeacherSections"
                        class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                        استادان
                        <i class=" float-left"
                            :class="showTeacherSections ? 'fa fa-arrow-circle-down text-green-300' :'fa fa-arrow-circle-left '"></i>
                    </a>

                    <ul x-show="showTeacherSections" x-transition.scale.90.delay.400ms>
                        @if (auth()->user()->role == 'supperAdmin')
                            <li>
                                <a href="{{ route('register') }}"
                                    class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">ایجاد
                                    حساب کاربری</a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('teacher.compelete.info') }}"
                                class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">تکمیل
                                کردن معلومات</a>
                        </li>
                        <li>
                            <a href="{{ route('teacher.index') }}"
                                class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                                اساتید</a>
                        </li>
                        <li>
                            <a href="{{ route('all.scientific.work.index') }}"
                                class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                                آثار علمی اساتید</a>
                        </li>

                        <li>
                            <a href="{{ route('suggestion.index') }}"
                                class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                                پیشنهادات ورکشاپ</a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="#" @click.prevent="showEmployee=!showEmployee"
                        class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                        کارمندان
                        <i class=" float-left"
                            :class="showEmployee ? 'fa fa-arrow-circle-down text-green-300' :'fa fa-arrow-circle-left '"></i>
                    </a>

                    <ul x-show="showEmployee" x-transition.scale.90.delay.400ms>
                        @if (auth()->user()->role == 'supperAdmin')
                            <li>
                                <a href="{{ route('register.employee') }}"
                                    class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                                    ایجاد حساب کاربری</a>
                            </li>
                        @endif


                        <li>
                            <a href="{{ route('employee.compelete.info') }}"
                                class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">تکمیل
                                کردن معلومات</a>
                        </li>
                        <li>
                            <a href="{{ route('all.scientific.employee.work.index') }}"
                                class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                                آثار عملی</a>
                        </li>
                        <li>

                            <a href="{{ route('employee.index') }}"
                                class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                                کارمندان</a>
                        </li>
                        <li>
                        <li>
                            <a href="{{ route('suggestion.employee.index') }}"
                                class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                                پیشنهادات ورکشاپ</a>
                        </li>


                </li>

        </ul>
        </li>

        <li>
            <a href="{{ route('workshop.index') }}"
                class="block py-4 m-1 {{ request()->is('workshop') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                ورکشاپ</a>
        </li>
        <li>
            <a href="{{ route('workshop.presented.index') }}"
                class="block py-4 m-1 {{ request()->is('presented/workshop') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                ورکشاپ های ارایه شده</a>
        </li>
        <li>
            <a href="#" @click.prevent="activeAccount = !activeAccount"
                class="block py-4 m-1  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                حساب های کاربری فعال
                <i class=" float-left"
                    :class="activeAccount ? 'fa fa-arrow-circle-down text-green-300' :'fa fa-arrow-circle-left '"></i>
            </a>
            <ul x-show="activeAccount" x-transition.scale.90.delay.400ms>
                <li>
                    <a href="{{ route('active.account.teacher.index') }}"
                        class="block py-4 m-1  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                        حساب های کاربری اساتید
                    </a>
                </li>
                <li>
                    <a href="{{ route('employee.acount.active.index') }}"
                        class="block py-4 m-1  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                        حساب های کاربری کارمندان
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.active.account.index') }}"
                        class="block py-4 m-1  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                        حساب های کاربری ادمین ها
                    </a>
                </li>
            </ul>
        </li>
        <li>
            @if (auth()->user()->role == 'supperAdmin')
                <a href="#" @click.prevent="deActiveAccount=!deActiveAccount"
                    class="block py-4 m-1  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">حساب
                    های کاربری غیر فعال
                    <i class=" float-left"
                        :class="deActiveAccount ? 'fa fa-arrow-circle-down text-green-300' :'fa fa-arrow-circle-left '"></i>
                </a>
                <ul x-show="deActiveAccount" x-transition.scale.90.delay.400ms>
                    <li>
                        <a href="{{ route('deActive.account.teacher.index') }}"
                            class="block py-4 m-1  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                            حساب های کاربری اساتید
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('employee.deActive.account.index') }}"
                            class="block py-4 m-1  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                            حساب های کاربری کارمندان
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.deActive.account.index') }}"
                            class="block py-4 m-1  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                            حساب های کاربری ادمین ها
                        </a>
                    </li>
                </ul>
            @endif
        <li>
            <a href="{{ route('outSidePresentor.index') }}"
                class="block py-4 m-1 {{ request()->is('outSidePresentor') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">ارایه
                دهنده گان بیرونی</a>
        </li>
        <li>
            <a href="{{ route('admin.create.account') }}"
                class="block py-4 m-1 {{ request()->is('create/admin/account') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                ایجاد حساب کاربری برای ادمین</a>
        </li>

        <li>
            <a href="{{ route('graph.month') }}"
                class="block py-4 m-1 {{ request()->is('graph/month') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                آمار گراف ماهانه</a>
        </li>
        <li>
            <a href="{{ route('graph.year') }}"
                class="block py-4 m-1 {{ request()->is('graph/year') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                آمار گراف سالانه</a>
        </li>
        <li>
            <a href="{{ route('alpine.index') }}"
                class="block py-4 m-1 {{ request()->is('bk') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                بک اپ گیری دیتابیس</a>
        </li>
        </li>
        @endif

        @if (auth()->user()->role == 'teacher')
            <li>
                {{--  --}}
                <a href="{{ route('dashboard.teacher') }}"
                    class="block py-4 m-1  {{ request()->is('dashboard/teacher') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    داشبورد</a>
            </li>
            <li>
                <a href="{{ route('workshop.report.present') }}"
                    class="block py-4 m-1 {{ request()->is('workshop/report/present') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    ورکشاپ های ارایه شده</a>
            </li>

            <li>
                <a href="{{ route('workshop.report.participate') }}"
                    class="block py-4 m-1 {{ request()->is('workshop/report/participate') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    ورکشاپ های گرفته شده</a>
            </li>
        @endif
        @if (auth()->user()->role == 'teacher' or auth()->user()->role == 'employee')
            <li>
                <a href="{{ route('scientific.index') }}"
                    class="block py-4 m-1 {{ request()->is('scientific') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    لیست آثار علمی</a>
            </li>
            <li>
                <a href="{{ route('scientific.create') }}"
                    class="block py-4 m-1 {{ request()->is('scientific/create') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    ثبت اثر علمی</a>
            </li>
            <li>
                <a href="{{ route('suggestion.index') }}"
                    class="block py-4 m-1 {{ request()->is('suggestion') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    ورکشاپ مورد نیاز دارید</a>
            </li>
            <li>
                <a href="{{ route('workshop.all.index') }}"
                    class="block py-4 m-1 rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    ورکشاپ ها</a>
            </li>
        @endif
        @if (auth()->user()->role == 'employee')
            <li>
                {{--  --}}
                <a href="{{ route('dashboard.employee') }}"
                    class="block py-4 m-1  {{ request()->is('dashboard/employee') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    داشبورد</a>
            </li>
            <li>
                <a href="{{ route('workshop.report.present.employee') }}"
                    class="block py-4 m-1 {{ request()->is('workshop/report/present') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    ورکشاپ های ارایه شده</a>
            </li>

            <li>
                <a href="{{ route('workshop.report.participate.employee') }}"
                    class="block py-4 m-1 {{ request()->is('workshop/report/participate') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                    ورکشاپ های گرفته شده</a>
            </li>
        @endif

        <li>
            <a href="{{ route('password.update') }}"
                class="block py-4 m-1 {{ request()->is('workshop/report/participate') ? 'bg-indigo-500 text-white' : '' }}  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white">
                تغییر رمز عبور</a>
        </li>
        <li class="mb-10">

            <a href="{{ route('logout') }}"
                class="block py-4 m-1  rounded px-4 text-sm  hover:bg-indigo-400 dark:hover:bg-gray-600 text-white dark:hover:text-white"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('خروج از سیستم') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        </li>
        </ul>
    </nav>
</aside>
