<div>
    <section class=" bg-purple-100 sm:rounded-md sm:shadow-sm sm:shadow-lg px-2">
        <div class="section-title">
            <h2>گزارش ورکشاپ به اساس سال </h2>
        </div>
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead class="font-bold">
                    <tr class="text-right">

                        <th
                            class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            سال
                        </th>
                        <th
                            class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            تعداد ورکشاپ ارایه شده
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($yearlyWorkshops as $yearlyWorkshop)
                        <tr>
                            <td
                                class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                {{ $yearlyWorkshop->year }}

                            </td>

                            <td
                                class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                {{ $yearlyWorkshop->totalworkshop }}
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <div class="p-2 m-3">
                {{ $yearlyWorkshops->links() }}
            </div>
        </div>
    </section>
</div>
