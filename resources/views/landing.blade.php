 @include('layouts.header')
 <section class="relative ">
     <div class="container mx-auto flex flex-col  md:flex-row items-center gap-12 mt-1">
         <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10 ">
             <img class="m-0 rounded rounded-tr-3xl  w-5/6 h-5/6 sm:w-3/4 sm:h-3/4 md:w-full md:h-full "
                 src="{{ asset('images/FB_IMG_16484728429863229.jpg') }}" alt="">
         </div>
         <div class="flex flex-1 flex-col items-center lg:items-start" dir="rtl">
             <h2 class="text-3xl md:text-4 lg:text-5xl text-center lg:text-left mb-6">
                 مرکز انکشاف مسلکی
             </h2>
             <p class="text-lg text-center lg:text-left mb-5">
                 به بخش سیستم مرکز انکشاف مسلکی خوش آمدید
             </p>
         </div>

     </div>
     <div
         class=" clear-both  h-52  rounded-r-3xl hidden lg:block overflow-hidden bg-indigo-500 
        absolute   w-2/4 top-52 mb-20">

     </div>
 </section>

 <section class="py-5 mt-6 lg:mt-20 bg-gray-200 px-4  overflow-hidden clear-both">

     <p class="  text-3xl text-center ">بخش تازه ترین ورکشاپ ها</p>
     <hr>
     {{-- workshop heading --}}
     <div class=" mx-auto " dir="rtl">
         @forelse ($workShop as $work)
             <div class="bg-purple-50 rounded-lg shadow-2xl py-5 px-3 my-4 ">
                 <header class="section-title">
                     <h2>{{ $work->title }}</h2>
                 </header>
                 <div class="">
                     <p>{{ $work->description }}</p>
                 </div>
                 <div class="grid grid-cols-3">
                     <p>
                         <span>تاریخ برگذاری</span>
                         <span>{{ $work->present_date }}</span>
                     </p>
                     <p>
                         <span>زمان برگذاری</span>
                         <span>{{ $work->present_time }}</span>
                     </p>
                 </div>
                 <div class="mt-5">
                     <a href="{{ route('login') }}"
                         class="bg-blue-500 hover:bg-blue-400 text-white p-2  rounded">اشتراک کردن</a>
                     <a href="{{ route('public.workshop.show', $work->id) }}"
                         class="bg-indigo-500 hover:bg-indigo-400 text-white p-2  rounded">دیدن معلومات</a>
                 </div>
             </div>
         @empty
             <div class="bg-purple-50 rounded-lg shadow-2xl py-5 px-3 my-4 text-center font-semibold">
                 <p class="heading2">ورکشاپی برای نمایش موجود نیست</p>
             </div>
         @endforelse
     </div>

     <div class="grid lg:grid-cols-3 lg:gap-2 sm:grid-cols-1 sm:gap-0 md:grid-cols-2 md:gap-1 mt-4" dir="rtl">
         <div class="bg-purple-100 rounded text-center text-black mb-4 rounded lg:px-2 md:px-4 sm:px-6">
             <h2 class="font-bold">تاریخچه مرکز انکشاف مسلکی</h2>
             <hr class="mt-3">
             <div class="text-right">
                 <p>وزارت تحصیلات عالی به منظور نهادینه سازی تحقیق،رهبری،سیستم های آموزشی مبتنی بر نتایج، شاگرد محوری
                     و تقویت مهارت های کارمندان پوهنتون طی سال ۱۳۹۶ این مرکز را به همکاری مالی پروژه(HEDP) تاسیس و
                     تجهیز نمود.</p>
                 <p>مرکز انکشاف مسلکی پوهنتون تعلیم و تربیه کابل متعهد به ارایه خدمات به منظور
                     بهبود،تقویت و گسترش دانش مسلکی همچون تحقیقات علمی، کار آفرینی، مهارت های زبانی و آموزش کمپیوتر
                     در راستای تحقق اهداف عالی پوهنتون تعلیم و تربیه کابل فعالیت می نماید.</p>
                 <p>ضمنا مهارت های علمی مسلکی اعضای کادر علمی این پوهنتون را از طریق تدویر ورکشاپها، سیمینارها،
                     کنفرانس ها و سایر برنامه های علمی تقویت میبخشد.</p>
             </div>
         </div>

         <div class="bg-purple-100 rounded text-center text-black mb-4 rounded lg:px-2 md:px-4 sm:px-6">
             <h2 class="font-bold">دیدگاه.</h2>
             <div class="text-right">

                 <p>
                     اخذ جایگاه بهترین و با اعتبارترین مرکز در سطح ملی در عرصه های تربیت کادر های متخصص متعهد ،
                     تحقیقات، زبانهای خارجی،کمیپوتر،علم آفرینی و ارایه خدمات اکادمیک.
                 </p>

                 <hr class="mt-2">
                 <h2 class="text-center font-bold mt-3">رسالت/ماموریت</h2>

                 <p>
                     مزکز انکشاف مسلکی متعهد به ارایه خدمات در جهت بهبود،تقویت و گسترش دانش مسلکی همچون تحقیقات
                     علمی،کار آفرینی،مهارت های زبانی و کمپیوتر در راستای تحقق اهداف عالی پوهنتون تعلیم و تربیه شهید
                     استاد ربانی فعالیت می نماید.
                 </p>
             </div>
         </div>

         <div class="bg-purple-100 rounded text-center text-black mb-4 rounded lg:px-2 md:px-4 sm:px-6">
             <div>
                 {{-- <hr> --}}
                 <h2 class="font-bold">هدف.</h2>
                 <p>تقویت، توسعه و ارتقای مهارتهای علمی – مسلکی اعضای کادر علمی پوهنتون تعلیم و تربیه کابل
                     ربانی با استفاده از ورکشاپهای ، سیمینارها، کنفرانس ها و سایر برنامه های علمی.</p>
                 <hr class="mt-2">
                 <h2 class="font-bold mt-3">مقاصد.</h2>
                 <ul class="text-right ">
                     <li><i class="fa fa-dot-circle text-blue-600" style="font-size: 8px"></i>
                         ارتقای ظرفیت منسوبین در بخش مدیریت و رهبریت </li>
                     <li><i class="fa fa-dot-circle text-blue-600" style="font-size: 8px"></i>
                         ترویج شیوه های جدید تدریس ترویج و تقویت فرهنگ تحقیق با معیار های معاصر در پوهنتون</li>
                     <li><i class="fa fa-dot-circle text-blue-600" style="font-size: 8px"></i>
                         تدویر برنامه علمی – مسلکی</li>
                     <li><i class="fa fa-dot-circle text-blue-600" style="font-size: 8px"></i>
                         تدویر کورس های انگلیسی و کمپیوتر </li>
                 </ul>
             </div>
         </div>
     </div>
 </section>
 @include('layouts.footer')
 </body>

 </html>
