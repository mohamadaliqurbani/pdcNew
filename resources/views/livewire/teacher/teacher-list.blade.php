<div>
    <section class="w-full  bg-purple-100 rounded-lg shadow-2xl">
        <header class="section-title px-2 py-1">
            <h2>
                لیست اساتید
            </h2>
        </header>
        <div x-data="{'showAddModal': false}">
            <input id="text" type="text" class="form-input m-1  w-max " wire:model="search" placeholder="جستجو">
        </div>
        @include('components.totats')
        <div class="flex flex-col" x-data="{'showModal': false,'showDeleteModal':false}">
            <div class=" overflow-x-auto  ">

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
                                    اسم
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    تحلض
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    عکس
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    ایمیل آدرس
                                </th>
                              
                              
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    گزاریش ورکشاپ
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    عملیه ها
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($users as $user)
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                        {{ $user->id }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $user->name }}

                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $user->lname }}

                                    </td>

                                    <td class="px-1 py-3">
                                        <img class="roundImage"
                                            src="{{ asset('asset/upload/image/') }}/{{ $user->image }}" alt="">

                                    </td>

                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                                            {{ $user->email }}
                                        </span>
                                    </td>

                                
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        <span>
                                            <a href="{{ route('teacher.report.workshop', $user->teacherInfo != null ? $user->teacherInfo->id : '') }}"
                                                class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-green-600 hover:outline-none hover:bg-green-400 transition duration-150 ease-in-out">
                                                <i class="fa fa-chart-line"></i>
                                            </a>
                                        </span>
                                    </td>
                                    <td
                                        class=" whitespace-no-wrap  border-b border-gray-200 text-sm leading-5 font-semibold">



                                        <a href="{{ route('teacher.edit', $user->id) }}"
                                            wire:click="$emit('edit',{{ $user->id }})"
                                            class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-indigo-600 hover:outline-none hover:bg-indigo-400 transition duration-150 ease-in-out"
                                            @click="showModal = !showModal">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('teacherInfo.edit', $user->teacherInfo->id) }}"
                                            wire:click="$emit('edit',{{ $user->id }})"
                                            class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-purple-600 hover:outline-none hover:bg-purple-400 transition duration-150 ease-in-out"
                                            @click="showModal = !showModal">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('teacher.show', $user) }}"
                                            wire:click="$emit('edit',{{ $user->id }})"
                                            class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-green-600 hover:outline-none hover:bg-green-400 transition duration-150 ease-in-out"
                                            @click="showModal = !showModal">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-2 m-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
