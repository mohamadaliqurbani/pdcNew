<div>
    <div class=" mx-auto w-full rounded bg-purple-100 shadow-2xl">
        <header class="section-title px-2 py-3">
            <h2>لیست حساب های کاربری فعال استاتید</h2>
            <input type="text" class="form-input mb-2" placeholder="جستجو" wire:model="search">
        </header>
        @include('components.totats')
        <div class="bg-white overflow-x-auto" x-data="{Deactive:false}">

            <div class="align-middle inline-block min-w-full  overflow-hidden ">
                <table class="min-w-full ">
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
                                تخلص
                            </th>
                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                ایمیل
                            </th>
                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                عکس
                            </th>
                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                دیپارتمنت
                            </th>
                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                غیر فعال کردن
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
                                <td
                                    class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                    {{ $user->email }}

                                </td>
                                <td class="border-b border-gray-200 pb-1">
                                    <img src="{{ asset('asset/upload/image') }}/{{ $user->image }}"
                                        class="roundImage mt-1" alt="">

                                </td>
                                <td
                                    class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                    @if ($user->teacherInfo->departmentOfTeacher!==null)
                                        
                                    <span
                                    class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                                    {{ $user->teacherInfo->departmentOfTeacher->department->name }}
                                </span>
                                @endif
                                </td>
                                <td
                                    class="px-1 py-1 whitespace-no-wrap  border-b border-gray-200 text-sm leading-5 font-semibold">


                                    <a wire:click="$emit('delete',{{ $user->id }})"
                                        class="cursor-pointer px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-red-600 hover:outline-none hover:bg-red-400 transition duration-150 ease-in-out"
                                        @click="Deactive = true">
                                        <i class="fa fa-trash"></i>
                                    </a>




                                    {{-- <button class=</button> --}}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                @if ($userDelete !== null)
                    <div class="modal-dialog" x-show="Deactive">
                        <div class="modal-content">
                            <div class=" w-full m-0 p-0">
                                <h1 class="text-red-600 text-bold mb-2">
                                    غیر فعال کردن حساب کاربری
                                </h1>
                                <hr>
                                <div class="block mx-auto mt-2">
                                    <form action="{{ route('deactive.account.teacher.delete', $userDelete->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <h2 class="text-indigo-700 font-bold mb-3">آیا عملیه غیر فعال کردن صورت گیرد؟
                                        </h2>
                                        <button class="bg-red-500 text-white hover:bg-red-300 rounded p-3"
                                            type="submit">
                                            بلی
                                        </button>

                                        <button @click="Deactive=false" class="bg-green-500 text-white hover:bg-green-300 rounded p-3" type="button">
                                            نخیر
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="p-2 m-3">
                    {{-- {{ $collages->links() }} --}}
                </div>
            </div>

        </div>
    </div>
</div>
