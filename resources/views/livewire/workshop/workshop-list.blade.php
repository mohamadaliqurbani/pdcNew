<div>
    <section class=" ">
        <div class="bg-purple-200 rounded-lg shadow-2xl" x-data="{'showModal': false,'showDeleteModal':false,deleteingmodel:'display:none',selectedId:null}">
            <header class="section-title px-4 py-2">
                <h2>
                    لیست ورکشاپ
                </h2>
            </header>
            @include('components.totats')
            <div class="grid grid-cols-2">
                <input id="text" type="text" class=" form-input m-1  " wire:model.lazy="search" placeholder="جستجو کردن؟ بعد از جستجو بالای لیست ورکشاپ کیلک نماید" autocomplete="off">
                <div  class="pb-5">
                    <p class="mt-5">

                        <a href="{{ route('workshop.create') }}" class="mt-5 bg-green-500 text-white p-3 rounded hover:bg-green-400">ثبت کردن ورکشاپ</a>
                    </p>
                </div>
            </div>
            <div class="bg-white p-2">
                <div x-show="showDeleteModal">
                    <div class="modal-dialog">
                        <div class="modal-content">


                            <h1 class=" p-2 hover:p-1 mhover">
                                <span class="float-left" @click="showDeleteModal = false"
                                    x-transition:enter="motion-safe:ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90">&times;</span>
                                <span class="float-right">حذف کردن ورکشاپ</span>
                            </h1>

                            <hr class="border-red-400 mt-4">
                            <div class="  ">

                                <form>
                                    @csrf
                                    @method('delete')
                                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium">
                                            آیا عملیه حذف صورت گیرد؟
                                        </span>
                                    </div>
                                    <button
                                        class="text-white bg-red-700 from-purple-600 to-blue-500 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                        type="submit">بلی</button>
                                    <button type="button" @click="showDeleteModal = false"
                                        class="text-white bg-green-500 from-pink-500 to-orange-400 hover:bg-green-700 focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-800 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">انصراف
                                        کردن</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($workshops as $workShop)
                    <div
                        class="w-full text-right rounded-r mb-2 border-r-4 border-b-2 
                    {{ $workShop->id % 2 == 0 ? 'border-blue-700 ' : 'border-orange-700' }}
                    sm:shadow-sm sm:shadow-lg   hover:bg-sky-700 ">
                        <div class="px-6 py-4"
                            x-data="{message: ' Alpine js is very awesome i want to use this '}">

                            <h4 class="mb-5 text-xl font-semibold text-sky-600">

                                {{ $workShop->title }}
                            </h4>
                            <p class="font-bold mt-2  mb-2 leading-normal text-sky-900 text-right">
                                {{ $workShop->description }}
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
                            <p class="mt-8">
                                <span class="text-blue-700">محل برگذاری</span> :
                                {{ $workShop->place }}
                               
                            </p>
                            <div class="mt-8">
                                <p class="p-2">
                                    @php
                                        $to = Carbon\Carbon::createFromDate(now()->toString());
                                        $date = Carbon\Carbon::create($workShop->present_date . '');
                                        $day = $to->diffInDays($date, false);
                                        $day=$day+1;
                                    @endphp
                                    @if ($day <= 0)
                                        <span class="text text-red-500 font-semibold" dir="rtl">
                                              {{ $day }} روز  سپری شده از برگذاری 
                                        </span>
                                        <p>
                                            <a href="{{ route('workshop.mak.asPresent',$workShop->id ) }}"
                                                class="btn text-primary">انتقال به بخش ارایه شده ها </a>
                                        </p>
                                    @else
                                        <span class="text text-green-500 font-semibold" dir="rtl">
                                           - مدت روز {{ $day }} باقی مانده تا برگذاری
                                        </span>
                                    @endif
                                </p>
                            </div>
                            <hr class="mt-2 border-white">
                            <div class="mt-5 ">
                                <a href="{{ route('workshop.edit', $workShop->id) }}"
                                    class="mx-1 rounded block bg-green-500 p-1 mt-2 md:inline  block text-white">
                                    بروز رسانی
                                </a>
                                <a href="{{ route('workshop.show', $workShop->id) }}"
                                    class="mx-1 rounded bg-blue-500 p-1 mt-2 md:inline  block text-white">
                                    دیدن معلومات
                                </a>
                                <button @click="deleteingmodel= 'display:block'; selectedId = {{ $workShop->id  }}"
                                    class="mx-1 rounded bg-red-500 p-1 mt-2 md:inline  block text-white">
                                    حذف کردن
                                </button>
                                <a href="{{ route('workshop.participate.present', $workShop->id) }}"
                                    class="mx-1 rounded bg-green-500 p-1 mt-2 md:inline  block text-white">
                                    افزدون اشتراک کننده/ارایه دهنده
                                </a>
                                <a href="{{ route('awearness.index', $workShop->id) }}"
                                    class="mx-1 rounded bg-blue-500 p-1 mt-2 md:inline  block text-white">
                                    اطلاع راسانی
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {{ $workshops->links() }}
            </div>

            <div class="modal-dialog2" :style="deleteingmodel">
                <div class="modal-content2">
                    <form action="{{ route('workshop.delete') }}" method="post">
                        @csrf
                        @method('delete')
                        <h1 class="bg-red-500 text-white p-4">آیا حذف ورکشاپ صورت گیرد؟</h1>
                        <input type="hidden" x-bind:value="selectedId" name="workshopId">

                        <div>
                            <button type="submit" class="bg-red-400 hover:bg-red-300 text-white p-3 mt-4 rounded">بلی</button>
                            <button type="button" @click="deleteingmodel = 'display:none'"  class="bg-green-400 hover:bg-green-300 text-white p-3 mt-4 rounded">نخیر</button>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>
