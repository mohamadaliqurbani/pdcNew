<div class="overflow-hidden">
    <form action="{{ route('awearness.employee.store', $workshop) }}" method="POST">
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
                @foreach ($employees as $employee)
                    <tr>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                            {{ $employee->id }}
                        </td>
                        <td
                            class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                            {{ $employee->user->name??  $employee->deActivedUser->name}}

                        </td>
                        <td
                            class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                            {{ $employee->user->lname ??  $employee->deActivedUser->lname }}

                        </td>

                        <td
                            class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                            {{ $employee->jop_posistion }}

                        </td>

                        <td
                            class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                           <label for="{{ $employee->id }}"> {{ $employee->user->email ??  $employee->deActivedUser->email  }}</label>

                        </td>
                        <td
                            class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                            {{ $employee->emp_phone }}

                        </td>
                        <td
                            class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                            <input type="checkbox"
                             name="employee_id[]" value="{{ $employee->id }}" id="{{ $employee->id }}">

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="float-right bg-green-400 text-white p-3 m-4 rounded">اطلاع رسانی</button>
    </form>
    <div class="p-3">
        {{ $employees->links('vendor.livewire.tailwind') }}
    </div>

</div>
