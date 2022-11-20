<div class="w-full px-3 container">
    <div>
        <button
            class=" bg-blue-900 text-white bottom-0 right-0 m-10 py-2 px-4 rounded-full shadow-xl hover:text-yellow-600 focus:outline-none "
            onclick="printArea()">print</button>
        <div id="printable">
            @if ($teacherinfo->user !== null)
                <div class="w-full lg:w-4/5 mx-auto bg-purple-100  rounded-lg   mb-4 min-h-0 shadow-2xl">
                    <div class="pt-1 mb-2">
                        <img src="{{ asset('asset/upload/image') }}/{{ $teacherinfo->user->image }}" alt=""
                            class="roundImage mx-auto border-2 border-blue-400 mt-1">
                        <p class="text-center font-extrabold">{{ $teacherinfo->user->name }} <span
                                class="pr-2">
                                {{ $teacherinfo->user->lname }}</span> </p>
                    </div>
                    <div class="bg-white ">
                        <div class="overflow-hidden p-3">
                            <span class="float-right">شماره تماس</span>
                            <span class="float-left m-1">{{ $teacherinfo->phone }}</span>
                        </div>

                        <div class="overflow-hidden p-3">
                            <span class="float-right"> ایمیل</span>
                            <span class="float-left m-1">{{ $teacherinfo->user->email }}</span>

                        </div>

                        <div class="overflow-hidden p-3">
                            <span class="float-right"> دیپارتمنت</span>
                            @if ($teacherinfo->departmentOfTeacher !== null)
                                <span
                                    class="float-left m-1">{{ $teacherinfo->departmentOfTeacher->department->name ?? '' }}</span>
                            @endif
                        </div>
                    </div>

                </div>
            @else
                <div class="w-full lg:w-4/5 mx-auto bg-purple-100  rounded-lg   mb-4 min-h-0 shadow-2xl">
                    <div class="pt-1 mb-2">
                        <img src="{{ asset('asset/upload/image') }}/{{ $teacherinfo->deActivedUser->image }}" alt=""
                            class="roundImage mx-auto border-2 border-blue-400 mt-1">
                        <p class="text-center font-extrabold">{{ $teacherinfo->deActivedUser->name }} <span
                                class="pr-2">
                                {{ $teacherinfo->deActivedUser->lname }}</span> </p>
                    </div>
                    <div class="bg-white ">
                        <div class="overflow-hidden p-3">
                            <span class="float-right">شماره تماس</span>
                            <span class="float-left m-1">{{ $teacherinfo->phone }}</span>
                        </div>

                        <div class="overflow-hidden p-3">
                            <span class="float-right"> ایمیل</span>
                            <span class="float-left m-1">{{ $teacherinfo->deActivedUser->email }}</span>

                        </div>

                        <div class="overflow-hidden p-3">
                            <span class="float-right"> دیپارتمنت</span>
                            <span
                                class="float-left m-1">{{ $teacherinfo->departmentOfTeacher->department->name ?? '' }}</span>
                        </div>
                    </div>

                </div>
            @endif

            <livewire:teacher-workshop-participant.teacher-workshop-participant :teacherinfo="$teacherinfo" />
            <livewire:teacher-workshop-present.teacher-workshop-present :teacherinfo="$teacherinfo" />

            <div class="w-full lg:w-4/5 mx-auto bg-purple-200 rounded-lg mb-4 shadow-2xl">
                <div class="pt-3 mb-5">
                    <h2 class="text-center font-extrabold"> لیست آثار علمی </h2>
                </div>
                <div class="bg-white overflow-hidden ">
                    <div class=" align-middle inline-block min-w-full shadow overflow-hidden  border-gray-200">
                        <table class="min-w-full">
                            <thead class="font-bold">
                                <tr class="text-right">
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        عنوان اثر
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        محل نشر
                                    </th>
                                    <th
                                        class="font-bold text-right px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                                        تاریخ نشر
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($scientificworks as $scientificwork)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
                                            {{ $scientificwork->title }}

                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
                                            <a href="{{ $scientificwork->work_url }}" target="_blanck">
                                                {{ $scientificwork->work_url }}</a>

                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-semibold text-gray-900">
                                            {{ $scientificwork->relase_date }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <div class="bg-green-400 text-white rounded p-3  w-full lg:w-4/5 mx-auto rounded-lg mb-4 shadow-2xl">
                تعداد آثار علمی استاد : {{ $scientificworks->count('scientificable_id') }}
            </div>
        </div>
    </div>
</div>
<script>
    function printArea() {
        const printContent = document.getElementById('printable').innerHTML;
        const orginalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = orginalContent;
    }
</script>
{{-- <script>
    function printArea() {
        const printContents = document.getElementById('AreaToBePrint').innerHTML;
        const originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script> --}}
