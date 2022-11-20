@include('layouts.header')

{{-- hero section --}}
<section class="relative {{ $scientificWorks->count('id') != 0 ? 'vh100' : '' }} ">
    <div class=" shadow-2xl container mx-auto w-4/5 bg-purple-100 mt-5 rounded " dir="rtl">
        <div class="heading2 text-center ">
            <h2>به بخش آثار علمی کاربران خوش آمدید</h2>
        </div>
        <div class="bg-white pt-5 ">
            <div class="grid lg:grid-cols-3 lg:gap-3 px-2 md:grid-cols-1 md:gap-0">

                @forelse ($scientificWorks as $scientificWork)
                    <div
                        class=" bg-purple-100 rounded w-full mb-4  shadow transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110">
                        <img class="roundImage mx-auto"
                            src="{{ asset('asset/upload/image') }}/{{ $scientificWork->image }}" alt="">
                        <div class="p-2 bg-white text-center">
                            <div>
                                <span> اسم : </span> <span>{{ $scientificWork->name }}</span>
                            </div>
                            <div>
                                <span> تخلص : </span> <span>{{ $scientificWork->lname }}</span>
                            </div>
                            <div class="pt-5">
                                <a href="{{ route('public.allScientificWork.show.user', $scientificWork->id) }}"
                                    class="text-green-400 text-white p-3 rounded hover:text-green-300 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 ...">دیدن
                                    معلومات کامل</a>
                            </div>
                        </div>
                    </div>
                @empty
                    @php
                        
                    @endphp
                @endforelse
            </div>
        </div>
    </div>
</section>
@if ($scientificWorks->count('id') != 0)
    @include('layouts.footer')
@endif
</body>

</html>
