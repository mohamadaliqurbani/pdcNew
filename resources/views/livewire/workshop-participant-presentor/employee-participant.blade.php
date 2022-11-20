<form action="{{ route('workshop.participate.employee',$workshop->id) }}" method="POST">
    @csrf
    <table class="min-w-full">
        <thead class="font-bold">
            <tr class=" text-center">
                <th
                    class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    #
                </th>
                <th
                    class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    اسم
                </th>
                <th
                    class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    تحلض
                </th>
                <th
                    class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    بست وظیفوی
                </th>
                <th
                    class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    ایمیل
                </th>
                <th
                    class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    شماره تماس
                </th>
                <th
                    class="font-bold  text-center px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                    انتخاب کردن
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @each('livewire.workshop-participant-presentor.employee-presentor',
            $employees,
            'employee',
            'livewire.workshop-participant-presentor.teacherNodata')
        </tbody>
    </table>
    @if ($employees->count('id')!==0)
        
    <button type="submit" class="float-right bg-green-400 text-white p-3 m-4 rounded">افزدون اشتراک کننده تتت</button>
    @endif
</form>
<div class="p-3">
    {{ $employees->links('vendor.livewire.tailwind') }}
</div>
