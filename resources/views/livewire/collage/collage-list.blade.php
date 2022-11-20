<div>
    <section class=" bg-purple-100 sm:rounded-md sm:shadow-sm sm:shadow-lg">
        <div x-data="{ 'showAddModal': false }">
            <h1 class=" font-bold p-4">لیست پوهنحی ها</h1>
            <input id="text" type="text" class="form-input m-1  w-max " wire:model="search" placeholder="جستجو">
            <button class="bg-green-500 p-3 rounded text-white hover:bg-green-300" @click="showAddModal = true">ثبت
                پوهنحی</button>

            <div x-show="showAddModal">
                <div class="modal-dialog">
                    <div class="modal-content">


                        <h1 class=" p-2 hover:p-1 mhover">
                            <span class="float-left" @click="showAddModal = false"
                                x-transition:enter="motion-safe:ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90">&times;</span>
                            <span class="float-right">ثبت پوهنحی</span>
                        </h1>

                        <hr class="border-red-400 mt-4">
                        <div class="  ">


                            <form wire:submit.prevent="createCollage" x-data="{ 'showAlert': true }">

                                <input id="text" type="text" class="form-input m-2  w-full " name="collage_name"
                                    wire:model.defer="data.collage_name" placeholder="اسم پوهنحی را بنوسید"
                                    autocomplete="off">
                                @error('collage_name')
                                    <div id="alert-border-2" x-show="showAlert"
                                        class="flex p-4 mb-4 bg-red-100 border-t-4 border-red-500 dark:bg-red-200"
                                        role="alert">
                                        <svg class="flex-shrink-0 w-5 h-5 text-red-700" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="ml-3 text-sm font-medium text-red-700">
                                            {{ $message }}
                                        </div>
                                        <button @click="showAlert = false" type="button"
                                            class="ml-auto -mx-1.5 -my-1.5 bg-red-100 dark:bg-red-200 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 dark:hover:bg-red-300 inline-flex h-8 w-8"
                                            data-collapse-toggle="alert-border-2" aria-label="Close">
                                            <span class="sr-only">Dismiss</span>
                                            &times;
                                        </button>
                                    </div>
                                @enderror
                                <button
                                    class="text-white bg-blue-700 from-purple-600 to-blue-500 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                    type="submit" @click="showAlert = true">ثبت کردن</button>
                                <button type="button" @click="showAddModal = false"
                                    class="text-white bg-red-500 from-pink-500 to-orange-400 hover:bg-red-700 focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-800 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">انصراف
                                    کردن</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col" x-data="{ 'showModal': false, 'showDeleteModal': false }">
            <div class=" overflow-x-auto  ">
                <div x-show="showModal">
                    <div class="modal-dialog">
                        <div class="modal-content">


                            <h1 class=" p-2 hover:p-1 mhover">
                                <span class="float-left" @click="showModal = false"
                                    x-transition:enter="motion-safe:ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90">&times;</span>
                                <span class="float-right">بروز رسانی کردن</span>
                            </h1>

                            <hr class="border-red-400 mt-4">
                            <div class="  ">
                                @if ($calloge != null)
                                    <form action="{{ route('collage.update', $calloge->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input id="text" type="text" class="form-input m-2  w-full "
                                            value="{{ $calloge->collage_name }}" name="collage_name">
                                        <button
                                            class="text-white bg-blue-700 from-purple-600 to-blue-500 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                            type="submit">بروز رسانی</button>
                                        <button type="button" @click="showModal = false"
                                            class="text-white bg-red-500 from-pink-500 to-orange-400 hover:bg-red-700 focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-800 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">انصراف
                                            کردن</button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="showDeleteModal">
                    <div class="modal-dialog">
                        <div class="modal-content">


                            <h1 class=" p-2 hover:p-1 mhover">
                                <span class="float-left" @click="showDeleteModal = false"
                                    x-transition:enter="motion-safe:ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90">&times;</span>
                                <span class="float-right">حذف کردن پوهنحی</span>
                            </h1>

                            <hr class="border-red-400 mt-4">
                            <div class="  ">
                                @if ($callogeid != null)
                                    <form wire:submit.prevent="destory({{ $callogeid }})">
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
                                @else
                                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                        role="alert">
                                        <span class="font-medium">{{ $deleteMessage }}</span>
                                    </div>
                                    <button type="button" @click="showDeleteModal = false"
                                        class="text-white bg-green-500 from-pink-500 to-orange-400 hover:bg-green-700 focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-800 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">برگشت</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead class="font-bold">
                            <tr class="text-right">
                                <th
                                    class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    #
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    اسم پوهنحی
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    تاریخ ثبت
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    عملیه ها
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($collages as $collage)
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                        {{ $collage->id }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $collage->collage_name }}

                                    </td>

                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                                            {{ $collage->created_at }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-1 py-1 whitespace-no-wrap  border-b border-gray-200 text-sm leading-5 font-semibold">



                                        <a wire:click="$emit('edit',{{ $collage->id }})"
                                            class="cursor-pointer px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-indigo-600 hover:outline-none hover:bg-indigo-400 transition duration-150 ease-in-out"
                                            @click="showModal = !showModal">بروز رسانی
                                        </a>
                                        <a wire:click="$emit('delete',{{ $collage->id }})"
                                            class="cursor-pointer px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-red-600 hover:outline-none hover:bg-red-400 transition duration-150 ease-in-out"
                                            @click="showDeleteModal = true">حذف کردن
                                        </a>




                                        {{-- <button class=</button> --}}
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-2 m-3">
                        {{ $collages->links() }}
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<script>
    Livewire.on('edit', {
        alert('A post was added with the id of: ');
    })
</script>
