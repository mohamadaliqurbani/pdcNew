<div class="overflow-hidden">
    <form action="{{route('awearness.teacher.store',$workshop->id) }}" method="POST">
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
            <tbody>
                @foreach ($teacherInfos as $teacherInfo)
                    <tr>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                            {{ $teacherInfo->user->id?? $teacherInfo->deActivedUser->id }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                            {{ $teacherInfo->user->name ?? $teacherInfo->deActivedUser->name  }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                            {{ $teacherInfo->user->lname ?? $teacherInfo->deActivedUser->lname }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                            {{ $teacherInfo->fname }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                            {{ $teacherInfo->phone }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                            @if ( $teacherInfo->departmentOfTeacher!==null)
                                
                            {{ $teacherInfo->departmentOfTeacher->department->name}}
                            @endif
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                            <label for="{{ $teacherInfo->id }}" class="font-semibold">
                                {{ $teacherInfo->user->email?? $teacherInfo->deActivedUser->email }}
                            </label>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900  text-center">
                            <input type="checkbox" name="teacherinfo_id[]" id="{{ $teacherInfo->id }}" value="{{ $teacherInfo->id }}">
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <button class="bg-green-400 hover:bg-green-300 p-3 text-white float-right mx-6 my-6 mb-10 rounded"
            type="submit">اطلاع رسانی</button>
    </form>
    <div class="p-3 float-left">
        {{ $teacherInfos->links('vendor.livewire.tailwind') }}
    </div>
</div>
