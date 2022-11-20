<div>
    <div class="bg-purple-100 rounded-lg lg:w-4/5 w-full mx-auto shadow-2xl">
        <header class="section-title py-2 px-3">
            <h2>لسیت اساتیدی که آثار علمی شان در سیستم به ثبت رسانیده اند.</h2>
        </header>
        @include('components.totats')
        <div class="bg-white  overflow-x-auto ">
            <div 
                class="align-middle inline-block min-w-full  overflow-hidden ">
                <table class="min-w-full ">
                    <thead class="font-bold">
                        <tr class="text-right">
                            <th
                                class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                #
                            </th>
                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                اسم
                            </th>
                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                تحلض
                            </th>
                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                دیپارتمنت
                            </th>
                            <th
                                class="px-6 text-right py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                 معلومات
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($users as $user)
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                    {{ $user->id }}
                                </td>
                                <td
                                    class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                    {{ $user->name }}

                                </td>

                                <td
                                    class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                    {{ $user->lname }}
                                </td>
                                <td
                                    class="px-6 py-4 font-semibold whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                    {{ $user->teacherInfo!==null?$user->teacherInfo->departmentOfTeacher->department->name :' '}}
                                </td>
                              
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold text-gray-900">
                                   <a href="{{ route('scientificwork.show',$user->id) }}" class="bg-indigo-400 hover:bg-indigo-300 text-white rounded py-1 px-2 ">
                                       <i class="fa fa-eye"></i>
                                   </a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="p-2 m-3">

                </div>
            </div>
        </div>
    </div>
</div>
