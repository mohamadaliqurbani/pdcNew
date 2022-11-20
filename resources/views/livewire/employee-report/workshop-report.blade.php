<div class="w-full px-3">

    <div class="w-full lg:w-4/5 mx-auto bg-purple-100  rounded-lg   mb-4 min-h-0 shadow-2xl">
        <div class="pt-2 mb-2  text-center">
            <img src="{{ asset('asset/upload/image') }}/{{ $employee->user->image }}" alt=""
                class="roundImage mx-auto mb-2">
            <span>{{ $employee->user->name }}</span> <span class="mr-2">{{ $employee->user->lname }}</span>
        </div>
        <div class="bg-white">
            <div class="overflow-hidden p-3">
                <span class="float-right">شماره تماس</span>
                <span class="float-left m-1">{{ $employee->emp_phone }}</span>
            </div>

            <div class="overflow-hidden p-3">
                <span class="float-right"> ایمیل</span>
                <span class="float-left m-1">{{ $employee->user->email }}</span>

            </div>

            <div class="overflow-hidden p-3">
                <span class="float-right">میزان تحصیلات </span>
                <span class="float-left m-1">{{ $employee->education_degree }}</span>
            </div>
            <div class="overflow-hidden p-3">
                <span class="float-right"> بست وظیفوی</span>
                <span class="float-left m-1">{{ $employee->jop_posistion }}</span>
            </div>
        </div>
    </div>

    <livewire:employee-workshop-present.employee-workshop-present :employee="$employee" />

    <livewire:employee-workshop-participate.employee-workshop-participate :employee="$employee" />


    <div class="bg-green-400 text-white rounded p-3  w-full lg:w-4/5 mx-auto rounded-lg mb-4 shadow-2xl">
        تعداد آثار علمی استاد : {{ $scientificWorks->count('scientificable_id') }}
    </div>
</div>
