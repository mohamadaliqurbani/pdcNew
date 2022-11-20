<form action="{{ route('workshop.participate.teacherInfo',$workshop->id) }}" method="POST">
    @csrf
    <table class="min-w-full">
        <thead class="font-bold">
            <tr class=" text-center">
                <th
                    class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    #
                </th>
                <th
                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    اسم
                </th>
                <th
                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    تحلض
                </th>
                <th
                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    ولد
                </th>
                <th
                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    تماس
                </th>
                <th
                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    دیپارتمنت
                </th>
                <th
                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    ایمیل آدرس
                </th>
                <th
                    class="px-6  text-center py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    انتخاب کردن
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @each('livewire.workshop-participant-presentor.teacher-presentor',
            $teacherInfos,
            'teacherInfo',
            'livewire.workshop-participant-presentor.teacherNodata')
        </tbody>
    </table>
    @if ($teacherInfos->count('id')!==0)
        
    <button type="submit" class="float-right bg-green-400 p-3 text-white m-4 rounded">افزدون اشتراک کننده</button>
    @endif
</form>
<div class="p-3">
    {{ $teacherInfos->links('vendor.livewire.tailwind') }}
</div>
