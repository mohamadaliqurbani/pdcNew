<div>

    <tbody class="bg-white">

        <tr>
            <td
                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                {{ $teacherInfo->user->id }}
            </td>
            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                {{ $teacherInfo->user->name }}

            </td>
            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                {{ $teacherInfo->user->lname }}

            </td>

            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                {{ $teacherInfo->fname }}

            </td>

            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                {{ $teacherInfo->phone }}

            </td>
            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5  text-center">
                @if ($teacherInfo->departmentOfTeacher!==null)
                    
                {{ $teacherInfo->departmentOfTeacher->department->name }}
                @endif

            </td> 

            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-center">
                <span
                    class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                    {{ $teacherInfo->user->email }}
                </span>
            </td>
            <td class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-center">
                {{-- {{ $teacherInfo->user->id }} --}}
                <input type="checkbox" name="teacher_id[]" id="" value="{{ $teacherInfo->id }}">
            </td>
        </tr>
    </tbody>
</div>
