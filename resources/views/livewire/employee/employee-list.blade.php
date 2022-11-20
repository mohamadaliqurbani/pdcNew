<div>
    <section class=" bg-purple-100 shadow-2xl rounded-lg py-5 px-4">
        <h1 class="font-bold">لیست کارمندان</h1>
        @include('components.totats')

        <div x-data="{'showAddModal': false}">
            <input id="text" type="text" class="form-input m-1  w-max " wire:model="search" placeholder="جستجو">
            {{-- <a href="{{ route('employee.create') }}" class="bg-green-500 text-white p-3 rounded">ثبت کردن</a> --}}
        </div>
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
                                    شماره تماس
                                </th>
                                <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    ایمیل
                                </th>
                                {{-- <th
                                    class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    ثبت بیوگرافی
                                </th> --}}
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
                            @forelse ($employees as $employee)

                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                        {{ $employee->user->id }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $employee->user->name }}

                                    </td>

                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $employee->user->lname }}

                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $employee->emp_phone }}

                                    </td>

                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        {{ $employee->user->email }}

                                    </td>
                                    <td
                                        class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        <a href="{{ route('employee.report.workshop',$employee->id) }}"
                                            class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-green-600 hover:outline-none hover:bg-green-400 transition duration-150 ease-in-out">
                                            <i class="fa fa-chart-line"></i>
                                        </a>

                                    </td>
                                    <td
                                        class="px-1 py-1 whitespace-no-wrap  border-b border-gray-200 text-sm leading-5 font-semibold">
                                        <a href="{{ route('employee.show', $employee->id) }}"
                                            class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-indigo-600 hover:outline-none hover:bg-indigo-400 transition duration-150 ease-in-out"
                                            @click="showModal = !showModal"> <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('employee.account.edit', $employee->user->id) }}"
                                            class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-indigo-600 hover:outline-none hover:bg-indigo-400 transition duration-150 ease-in-out"
                                            @click="showModal = !showModal">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-2 m-3">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
