<div>
    <section class=" bg-purple-100 sm:rounded-md sm:shadow-sm sm:shadow-lg">
     <header class="section-title py-1 px-2">
         <h2>لیست حساب کاربری استاد یا استادان برای تکمیل کردن معلومات</h2>
     </header>
        @include('components.totats')
        <div x-data="{'showAddModal': false}">
            <input placeholder="جستجو" id="text" type="text" class="form-input m-1  w-max " wire:model="search">
        </div>
       
        <div class="flex flex-col">
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
                                    تخلص
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
                                    class="px-6 text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider ">
                                   تکمیل کردن
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
                                        class=" whitespace-no-wrap  border-b border-gray-200 text-sm leading-5 font-semibold text-center">


                                            <a href="{{ route('teacherInfo.create', $user->id) }}"
                                                wire:click="$emit('edit',{{ $user->id }})"
                                                class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-indigo-600 hover:outline-none hover:bg-indigo-400 transition duration-150 ease-in-out"
                                               title="complelete"> <i
                                                    class="fa fa-check"></i>
                                            </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">
                                        <h1 class="bg-blue-400 p-2 text-center m-4 rounded text-white">
                                            دیتای دریافت نشد
                                        </h1>
                                    </td>
                                </tr>
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
