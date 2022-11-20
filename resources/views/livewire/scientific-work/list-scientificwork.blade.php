<div>
    <div class="container mx-auto grid lg:grid-cols-3 lg:gap-2 md:grid-cols-2 md:gap-1  sm:grid-cols-1 overflow-x-auto ">
        @forelse ($scientificWorks as $scientificWork)
            <div class=" mb-3 rounded-lg bg-purple-200 shadow-2xl ">
                <img src="{{ asset('asset/upload/image') }}/{{ $scientificWork->cover_photo ?: $scientificWork->scientificable->image }}"
                    alt="" class="object-cover h-40 w-full rounded-t">
                <div class="px-2 py-2">
                    <header class="p-4 text-right">
                        <p class=" font-extrabold">عنوان اثر : <span>{{ $scientificWork->title }}</span></p>
                    </header> 
                    {{-- content --}}
                    <div class="">
                        <p class="text-gray-900 mb-2">نوعیت اثر: <span>{{ $scientificWork->type }}</span></p>
                        <p class="text-gray-900 mb-2"> سطح اثر: <span>{{ $scientificWork->level }}</span></p>

                        <p class="text-gray-900 font-semibold">تاریخ نشر :
                            <span>{{ $scientificWork->relase_date }}</span></p>
                        <p class="text-gray-900 font-semibold"> در سایت که بنشر رسیده : <a
                                href="{{ $scientificWork->work_url }}"
                                class="text-blue-700 hover:text-blue-500">{{ $scientificWork->work_url }}</a></p>
                        <a href="{{ route('scientific.edit', $scientificWork->id) }}"
                            class="mt-2 block p-3 rounded-lg bg-green-400 text-white hover:bg-green-300">بروز رسانی</a>

                        <a href="{{ route('showScientificWork', $scientificWork->id) }}"
                            class="mt-2 block p-3 rounded-lg bg-indigo-400 text-white hover:bg-indigo-300">توضیحات </a>
                    </div>

                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>
