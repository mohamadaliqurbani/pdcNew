<div>
    <div class="container" x-data="{presentor:false,participant:false}">

        <div class="w-full mt-6 rounded-lg sm:shadow-sm sm:shadow-lg bg-gray-200 text-center hover:bg-sky-700 ">
            <div class="bg-gary-400 p-4">
                <button class="bg-blue-500 text-white p-2 rounded shadow"
                    @click="participant = !participant ; presentor = false">افزدون اشتراک کننده</button>
                <button class="bg-green-500 text-white p-2 rounded shadow"
                    @click="presentor = !presentor;participant =false">افزدون ارایه
                    دهنده</button>
                <a href="{{ route('outSidePresentor.create', $workshop->id) }}" class="bg-indigo-500 text-white p-2 rounded shadow">ارایه دهنده بیرونی</a>
                @include('components.totats')

            </div>
            <section class="bg-white">
                <div class="container p-4">
                    <div x-show="presentor">
                        <select name="" id="" class="bg-blue-200 p-3 rounded"
                            wire:change="fetchPresentor($event.target.value,{{ $workshop->id }})">
                            <option value="0">انتخاب ارایه دهنده از بخشی ؟</option>
                            <option value="1">انتخاب ارایه دهنده استادان</option>
                            <option value="2"> ارایه دهنده کارمندان</option>

                        </select>
                    </div>
                    <div x-show="participant">
                        <select name="" id="" class="bg-sky-500 p-3 rounded"
                            wire:change="fetchParticipant($event.target.value,{{ $workshop->id }})">
                            <option value="0">انتخاب اشتراک کننده از بخشی ؟</option>
                            <option value="t1">انتخاب اشتراک کننده استادان</option>
                            <option value="e2">انتخاب اشتراک کننده کارمندان</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class=" overflow-x-auto  ">
                        @if (!$showOutSide)
                            <input x-show="presentor || participant" type="text" class="form-input"
                                placeholder="جستجو" wire:model="search">

                        @endif
                        <div class="px-5">
                            <div
                                class="inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

                                @if ($showTeachers)
                                    {{-- {{ $workshop->id }} --}}
                                    <form action="{{ route('workshop.present.teacherInfo', $workshop->id) }}"
                                        method="POST">
                                        @csrf
                                        <table class="min-w-full">
                                            <thead class="font-bold">
                                                <tr class=" text-center">
                                                    <th
                                                        class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        #
                                                    </th>
                                                    <th
                                                        class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        اسم
                                                    </th>
                                                    <th
                                                        class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        تحلض
                                                    </th>
                                                    <th
                                                        class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        ولد
                                                    </th>
                                                    <th
                                                        class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        تماس
                                                    </th>
                                                    <th
                                                        class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        دیپارتمنت
                                                    </th>
                                                    <th
                                                        class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        ایمیل آدرس
                                                    </th>
                                                    <th
                                                        class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        انتخاب کردن
                                                    </th>
                                                </tr>
                                            </thead>
                                            @each('livewire.workshop-participant-presentor.teacher-presentor',
                                            $teacherInfos,
                                            'teacherInfo',
                                            'livewire.workshop-participant-presentor.teacherNodata')
                                        </table>
                                        <button type="submit"
                                            class="m-2 float-right rounded bg-green-400 text-white p-3">افزدون ارایه
                                            کننده</button>
                                    </form>
                                    {{ $teacherInfos->links('vendor.livewire.tailwind') }}


                                @elseif ($showEmployees)
                                    <form action="{{ route('workshop.present.employee', $workshop->id) }}"
                                        method="POST">
                                        @csrf
                                        <table class="min-w-full">
                                            <thead class="font-bold">
                                                <tr class=" text-center">
                                                    <th
                                                        class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        #
                                                    </th>
                                                    <th
                                                        class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        اسم
                                                    </th>
                                                    <th
                                                        class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        تحلض
                                                    </th>
                                                    <th
                                                        class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        بست وظیفوی
                                                    </th>
                                                    <th
                                                        class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        ایمیل
                                                    </th>
                                                    <th
                                                        class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        شماره تماس
                                                    </th>
                                                    <th
                                                        class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                                        انتخاب کردن
                                                    </th>
                                                </tr>
                                            </thead>
                                            @each('livewire.workshop-participant-presentor.employee-presentor',
                                            $employees,
                                            'employee', 'livewire.workshop-participant-presentor.employeeNoData')
                                        </table>
                                        @if ($employees->count('id')!==0)
                                            
                                        <button type="submit"
                                        class="m-2 float-right rounded bg-green-400 text-white p-3">افزدون ارایه
                                        کننده
                                    </button>
                                    @endif
                                    </form>
                                    {{ $employees->links() }}


                                @endif
                                @if ($teacherParticipant)
                                    @include('livewire.workshop-participant-presentor.teacher-participant')
                                @elseif($employeeParticipant)
                                    @include('livewire.workshop-participant-presentor.employee-participant')
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
