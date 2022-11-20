<div>
    <div class="bg-purple-100 rounded-lg shadow-2xl">
        <header class="section-title px-4 py-2">
            <h2>لیست ارایه دهنده گان بیرونی ورکشاپ ها</h2>
        </header>
        @include('components.totats')
        <input type="text" class=" mx-2 my-1 form-input" wire:model="search">
        {{-- work_shop_id --}}
        <div class="bg-white overflow-x-auto">
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
                                عنوان ورکشاپ
                            </th>
                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                ایمیل آدرس
                            </th>


                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                عملیه ها
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($outSidePresentors as $outSidePresentor)
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                    {{ $outSidePresentor->id }}
                                </td>
                                <td
                                    class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                    {{ $outSidePresentor->name }}

                                </td>
                                <td
                                    class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                    {{ $outSidePresentor->lname }}

                                </td>

                                <td class="px-1 py-3">
                                    <img class="roundImage"
                                        src="{{ asset('asset/upload/outside/') }}/{{ $outSidePresentor->image }}"
                                        alt="">

                                </td>
                                <td>
                                    {{ $outSidePresentor->workShop->title }}
                                </td>
                                <td
                                    class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                                        {{ $outSidePresentor->email }}
                                    </span>
                                </td>


                                <td
                                    class=" whitespace-no-wrap  border-b border-gray-200 text-sm leading-5 font-semibold">



                                    <a href="{{ route('outSidePresentor.edit', $outSidePresentor->id) }}"
                                        wire:click="$emit('edit',{{ $outSidePresentor->id }})"
                                        class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-indigo-600 hover:outline-none hover:bg-indigo-400 transition duration-150 ease-in-out"
                                        @click="showModal = !showModal">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('outSidePresentor.show',$outSidePresentor->id) }}"
                                        class="px-3 py-3 m-1 rounded-md text-sm font-semibold leading-5 text-white bg-indigo-600 hover:outline-none hover:bg-indigo-400 transition duration-150 ease-in-out">
                                       
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="p-2 m-3">
                    {{ $outSidePresentors->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
