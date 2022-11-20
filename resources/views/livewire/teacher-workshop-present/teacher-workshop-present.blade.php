<div class="w-full lg:w-4/5 mx-auto bg-purple-200 rounded-lg mb-4 shadow-2xl">
    <div class="pt-3 mb-5">
        <h2 class="text-center font-extrabold">تسهیل کننده</h2>
    </div>

    <div class="bg-white overflow-hidden ">
        <div class=" align-middle inline-block min-w-full shadow overflow-hidden  border-gray-200">
            <table class="min-w-full">
                <thead class="font-bold">
                    <tr class="text-right">
                        <th
                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            عنوان ورکشاپ
                        </th>
                        <th
                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            تاریخ ارایه
                        </th>
                        <th
                            class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            زمان ارایه
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($presents as $workshop)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
                                {{ $workshop->title }}

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
                                {{ $workshop->present_date }}

                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
                                {{ $workshop->present_time }}

                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
