<div>
    <div>
        <div>
            <div class="bg-purple-100 w-full rounded-lg shadow-2xl">
                <header class="section-title py-2 px-5">
                    <h2>لیست ورکشاپها</h2>
                </header>
                @include('components.totats')
                <input type="text" class="form-input mb-2 mx-3" wire:model="search">
                <div class="bg-white ">
                    <div class="bg-white overflow-x-auto" x-data="{openModalParticipate:false}">
                      
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
                                            عنوان
                                        </th>
                                        <th
                                            class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            توضیحات
                                        </th>
                                        <th
                                            class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            زمان
                                        </th>

                                        <th
                                            class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            تاریخ
                                        </th>
                                        <th
                                            class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                            اشتراک
                                        </th>
                                    </tr>
                                </thead>
                               
                                <tbody class="bg-white" >
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
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $workshop->description }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $workshop->present_time }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                                {{ $workshop->present_date }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                               <button  @click="openModalParticipate = true"
                                               wire:click="$emit('signleworkShop',{{ $workshop->id }})"
                                               class="bg-green-500 hover:bg-300 text-white p-3 rounded">
                                               <i class="fa fa-check">
                                                   <i class="fa fa-user"></i>
                                               </i></button>
                                            </a>
    
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="   modal-dialog " x-show="openModalParticipate">
                                <div class="modal-content">
                                    <header class="section-title">
                                        <h1 class="text-indigo-700 text-3xl font-semibold mb-3">اشتراک کردن</h1>
                                    </header>
                                    <hr>
                                    @if ($selectworkshop != null)
                                        <div class="mt-2">
                                            <form action="{{ route('workshops.store.singleParticipant', $selectworkshop) }} "
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 hover:bg-green-300 text-white p-3 rounded">اشتراک</button>
                                                <button 
                                                    type="button" @click="openModalParticipate=false"
                                                class="bg-red-500 hover:bg-red-300 text-white p-3 rounded">صرف نظر
                                                    کردن</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="p-2 m-3">
                                {{-- {{ $collages->links() }} --}}
                            </div>
                   
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
