 @include('layouts.header')
 {{-- hero section --}}
 <section class="bg-purple-50 p-0 -mt-4 vh100">
     <div class=" mx-auto " dir="rtl">
         <div class="rounded-lg  py-5 px-3 my-4 mx-5 mx-auto text-center text-lg">
             <header class="section-title">
                 <h1 class="heading2">{{ $workShop->title }}</h1>
             </header>
             <div class="">
                 <p>{{ $workShop->description }}</p>
             </div>
             <div class="mx-auto text-center te">
                 <p> 
                     <span>تاریخ برگذاری</span>
                     <span>{{ $workShop->present_date }}</span>
                 </p>
                 <p>
                     <span>زمان برگذاری</span>
                     <span>{{ $workShop->present_time }}</span>
                 </p>
                 <p>
                    <span>محل برگذاری : </span>
                    <span>{{ $workShop->place }}</span>
                </p>
             </div>
             <div class="container mx-auto">
                 @if ($workShop->presentor->count('id') !== 0 or $workShop->outSidePresentor->count('id') !== 0)
                     <div class="bg-purple-200 mx-auto w-full lg:w-2/5 rounded mt-5 shadow-2xl">
                         <h2 class="heading2">معلومات مختصر در مورد ارایه دهنده گان</h2>
                         <div class="bg-white">

                             @forelse ($workShop->presentor as $presentor)
                                 <div class="grid grid-cols-3  pb-4 ">

                                     <div class="col-span-1">
                                         <img class="roundImage mx-auto border-cool-gray-600 border-2"
                                             src="{{ asset('asset/upload/image') }}/{{ $presentor->presentorable->user->image }}"
                                             alt="">
                                     </div>
                                     <div class="col-span-2">

                                         <div>
                                             <span>ارایه دهنده : </span>
                                             @if ($presentor->presentorable_type == 'App\Models\TeacherInfo')
                                                 <span>{{ $presentor->presentorable->user->teacherInfo->teacherEduDegree != null? $presentor->presentorable->user->teacherInfo->teacherEduDegree->edu_degree: '' }}</span>
                                             @endif
                                             <span>{{ $presentor->presentorable->user->name }}</span>
                                             <span>{{ $presentor->presentorable->user->lname }}</span>
                                         </div>
                                         @if ($presentor->presentorable_type == 'App\Models\TeacherInfo')
                                             <div>

                                                 <span> عضو دیپارتمنت : </span>
                                                 <span>
                                                     {{ $presentor->presentorable->user->teacherInfo->departmentOfTeacher->department->name }}
                                                 </span>
                                             </div>
                                         @endif
                                         @if ($presentor->presentorable_type == 'App\Models\Employee')
                                             <div>
                                                 <span> عضو دیپارتمنت : </span>
                                                 <span>
                                                     {{ $presentor->presentorable->user->employee->jop_posistion }}
                                                 </span>
                                             </div>
                                         @endif
                                     </div>
                                 </div>
                             @empty

                             @endforelse
                             @forelse ($workShop->outSidePresentor as $outSidePresentor)
                                 <div class="grid grid-cols-3  pb-4 ">

                                     <div class="col-span-1">
                                         <img class="roundImage mx-auto border-cool-gray-600 border-2"
                                             src="{{ asset('asset/upload/outside') }}/{{ $outSidePresentor->image }}"
                                             alt="">
                                     </div>
                                     <div class="col-span-2">

                                         <div>
                                             <span>ارایه دهنده : </span>
                                             {{-- <span>{{  }}</span> --}}
                                             <span>{{ $outSidePresentor->name }}</span>
                                             <span>{{ $outSidePresentor->lname }}</span>
                                         </div>
                                         <div>
                                            @if ($outSidePresentor->info!=null)
                                                
                                            <p> معلومات مختصر در مورد مهمان </p>
                                            <b>
                                                {{ $outSidePresentor->info }}
                                            </b>
                                            @endif
                                             <p>مهمان برنامه</p>
                                         </div>
                                     </div>
                                 </div>
                             @empty
                             @endforelse
                         </div>
                     </div>

                 @endif
             </div>
             <div class="mt-5">
                 <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-400 text-white p-2  rounded">اشتراک
                     کردن</a>
             </div>
         </div>
     </div>
 </section>
 </body>

 </html>
