<div x-data="{showSeachModal:false,notShowWhilePrint:true}">
    <div class="mb-3">
        <button
            class="bg-blue-900 text-white bottom-0 right-0  py-2 px-4 rounded-full shadow-xl hover:text-yellow-600 focus:outline-none"
            onclick="printArea()" @focus="notShowWhilePrint=false">چاپ کردن</button>
        <button
            class="bg-blue-900 text-white bottom-0 right-0  py-2 px-4 rounded-full shadow-xl hover:bg-blue-600 focus:outline-none"
            @click="showSeachModal=true">جستجو بین دو تاریخ</button>
    </div>
    <div class=" mx-auto bg-purple-100 rounded pb-2 overflow-x-auto" dir="rtl" id="AreaToBePrint">
        <header class="section-title px-3 py-2">
            <h2>لیست ورکشاپ های که در این سال ارایه شده اند</h2>
        </header>
        <input type="text" class="form-input my-3 mx-2 w-2/6" wire:model="search" x-show="notShowWhilePrint"
            placeholder="جستجو به اساس تاریخ،زمان و عنوان">


        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead class="font-bold">
                    <tr class="text-right">
                        <th
                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            #
                        </th>
                        <th
                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            عنوان
                        </th>
                        <th
                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase ">
                            توضیحات
                        </th>
                        <th
                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            تاریخ برگذازی
                        </th>
                        <th
                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            زمان برگذازی
                        </th>
                        <th x-show="notShowWhilePrint"
                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            دیدن معلومات
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($workshops as $workshop)
                        <tr>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                {{ $workshop->id }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                {{ $workshop->title }}
                            </td>
                            <td
                                class=" whitespace-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                {{ $workshop->description }}
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                {{ $workshop->present_date }}
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                {{ $workshop->present_time }}
                            </td>
                            <td x-show="notShowWhilePrint"
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                <a href="{{ route('workshop.show', $workshop) }}"
                                    class="bg-indigo-500 hover:bg-indigo-400 text-white p-2  rounded">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    {{ $workshops->links() }}
                </tbody>
            </table>
            {{-- <div >
                @forelse ()
                    <div class="bg-purple-100 shadow-2xl py-5 px-3 my-4 mx-5 ">
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
                        </div>
                        <div class="mt-5">
                            <a href="{{ route('workshop.show', $workshop) }}"
                                class="bg-indigo-500 hover:bg-indigo-400 text-white p-2  rounded">دیدن معلومات</a>
                        </div>
                    </div>

            </div> --}}
            <div class="modal-dialog" x-show="showSeachModal">
                <div class="modal-content">
                    <p class="block">
                        <span class=" text-red-500 p-4 cursor-pointer" @click="showSeachModal=false">&times;</span>

                    </p>
                    <hr>

                    <h1 class="heading2">
                        جستجو کردن ورکشاپ های ارایه شده بین دو تاریخ
                    </h1>
                    <form wire:submit.prevent="dateBetweenSearch">

                        <input type="date" class="form-input mb-2 w-full" placeholder="تاریخ اولی"
                            wire:model.defer="firstDate">

                        <input type="date" class="form-input mb-2 w-full" placeholder="تاریخ دومی"
                            wire:model.defer="secondDate">

                        <button type="submit"
                            class="mt-2 bg-green-400 text-white rounded-lg p-3 hover:bg-green-500">جستجو</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printArea() {
            const printContents = document.getElementById('AreaToBePrint').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
