<div>

    <tbody class="bg-white">
        <tr>
            <td
                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                {{ $employee->id }}
            </td>
            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                {{ $employee->user->name }}

            </td>
            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                {{ $employee->user->lname }}

            </td>

            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                {{ $employee->jop_posistion }}

            </td>

            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                {{ $employee->user->email }}

            </td>
            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                {{ $employee->emp_phone }}

            </td>
            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
               <input type="checkbox" name="employee_id[]" value="{{ $employee->id }}" id="">

            </td>
            
        </tr>
    </tbody>
</div>
