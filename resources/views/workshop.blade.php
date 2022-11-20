 @include('layouts.header')
 {{-- hero section --}}
 <section class="relative {{ $workshops->count('id') != 0 ? 'vh100' : '' }}">
     <div class="container mx-auto " dir="rtl">
         @forelse ($workshops as $workshop)
             <div class="bg-purple-50 rounded-lg shadow-2xl py-5 px-3 my-4 mx-5">
                 <header class="section-title">
                     <h2>{{ $workshop->title }}</h2>
                 </header>
                 <div class="">
                     <p>{{ $workshop->description }}</p>
                 </div>
                 <div class="grid grid-cols-3">
                     <p>
                         <span>تاریخ برگذاری</span>
                         <span>{{ $workshop->present_date }}</span>
                     </p>
                     <p>
                         <span>زمان برگذاری</span>
                         <span>{{ $workshop->present_time }}</span>
                     </p>
                     <p>
                         <span>محل برگذاری : </span>
                         <span>{{ $workshop->place }}</span>
                     </p>
                 </div>
                 <div class="mt-5">
                     <a href="{{ route('login') }}"
                         class="bg-blue-500 hover:bg-blue-400 text-white p-2  rounded">اشتراک کردن</a>
                     <a href="{{ route('public.workshop.show', $workshop->id) }}"
                         class="bg-indigo-500 hover:bg-indigo-400 text-white p-2  rounded">دیدن معلومات</a>
                 </div>
             </div>
         @empty
         @endforelse
     </div>
 </section>
 @if ($workshops->count('id') != 0)
     @include('layouts.footer')
 @endif
 </body>

 </html>
