<div>
    <div>
        <div class="bg-purple-100 shadow-2xl rounded-lg py-5 px-4" x-data="{showmodel:false,editModal:false}">
            <header class="section-title">
                <h2>  لیست ورکشاپ های پیشنهاد شده توسط کارمند
    
                </h2>
            </header>
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
                                <th
                                    class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                    تاریخ ثبت
                                </th>
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
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                        {{ $suggession->created_at }}
                                    </td>
                                </tr>
        
                            @empty
                            <tr>
                                <td colspan="100%">
                                    <h2 class="heading2 mx-3 my-2">تا حالا هیچ اثر علمی از طرف کدام کارمند ثبت سیستم نشده است!</h2>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>
    </div>
    
</div>
