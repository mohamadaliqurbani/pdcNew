<div>
    <div class="bg-purple-100 shadow-2xl rounded-lg py-5 px-4" x-data="{showmodel:false,editModal:false}">
        <header class="section-title">
            <h2> لیست ورکشاپ های پیشنهاد شده توسط

                @if (auth()->user()->role == 'teacher' || auth()->user()->role == "employee")
                    شما
                @else
                    اساتید
                @endif
            </h2>
        </header>
        @if (auth()->user()->role !='supperAdmin' and  auth()->user()->role !='admin')
        <button class="bg-green-500 text-white hover:bg-green-400 rounded-lg p-2 mb-3" @click="showmodel=true">ثبت
            عنوان
            ورکشاپ مورد نیاز </button>
        <div class="modal-dialog" x-show="showmodel">
            <div class="modal-content">
                <div class=" overflow-hidden ">
                    <span class="float-right text-2xl cursor-pointer hover:bg-red-400 rounded"
                        @click="showmodel=false">
                        &times;</span>
                </div>
                <form action="{{ route('suggestion.store') }}" method="POST">
                    @csrf
                    <label for="title" class="font-bold pb-2">عنوان</label>
                    <input type="text" name="title" id="title" class="w-full form-input rounded mb-4 mt-4">
                    <button class="p-3 bg-green-600 hover:bg-green-500 text-white rounded" type="submit">ثبت
                        کردن</button>
                </form>
            </div>
        </div>
            
        @endif
        <input wire:model="search" type="text" class="form-input mb-1"
                placeholder="جستجو">
        <div class="overflow-x-auto">
            <div class=" align-middle inline-block min-w-full  overflow-hidden sm:rounded-lg border-b border-gray-200">
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
                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                پشنهاد شده توسطی
                            </th>
                            {{-- @if (auth()->user()->role === 'teacher') --}}
                                <th
                                    class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    دیپارتمنت
                                </th>
                            {{-- @endif --}}
                            <th
                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                تاریخ ثبت
                            </th>
                            @if (auth()->user()->role !== 'admin' || auth()->user()->role == "supperAdmin")
                                <th
                                    class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    بروزرسانی
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($suggessions as $suggession)
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                    {{ $suggession->id }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                    {{ $suggession->title }}
                                </td>
    
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                    {{ $suggession->suggestionable->name }}
                                    <span class="mx-1"> {{ $suggession->suggestionable->lname }} </span>
                                </td>
                                {{-- @if (auth()->user()->role === 'teacher') --}}
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                    {{ $suggession->suggestionable->teacherInfo!==null?$suggession->suggestionable->teacherInfo->departmentOfTeacher->department->name :''}}
    
                                </td>
                                {{-- @endif --}}
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                    {{ $suggession->created_at }}
                                </td>
                                @if (auth()->user()->role !== 'admin')
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
    
                                        <a @click="editModal=true" wire:click="$emit('edit',{{ $suggession->id }})"
                                            class="cursor-pointer bg-green-500 text-white hover:bg-green-400 rounded px-3 py-2 text-center">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
    
                        @empty
                        <tr>
                            <td colspan="100%">
                                <h2 class="heading2 mx-3 my-2">تا حالا هیچ  ورکشاپی  از طرف کدام استاد پیشنهاد نشده !</h2>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        <div class="modal-dialog" x-show="editModal">
            <div class="modal-content">
                <div class=" overflow-hidden ">
                    <span class="float-right text-2xl cursor-pointer hover:bg-red-400 rounded" @click="editModal=false">
                        &times;</span>
                </div>
                @if ($selectedSuggession != null)
                    <form action="{{ route('suggestion.update', $selectedSuggession->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <label for="title" class="font-bold pb-2">عنوان</label>
                        <input value="{{ $selectedSuggession->title }}" type="text" name="title" id="title"
                            class="w-full form-input rounded mb-4 mt-4">
                        <button class="p-3 bg-green-600 hover:bg-green-500 text-white rounded" type="submit">بروز رسانی
                            کردن</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
