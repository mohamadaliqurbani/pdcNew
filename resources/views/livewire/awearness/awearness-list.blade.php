<div>
    <div class="w-full mt-6 rounded-lg sm:shadow-sm sm:shadow-lg bg-gray-200 text-center hover:bg-sky-700 ">

        <div x-data="{showTeachers:false,showEmployees:false}">

            <div class="px-6 py-4">

                <button class="focus:outline-none bg-green-600 p-3 text-white rounded hover:bg-green-400"
                    @click="showEmployees= false,showTeachers= true" wire:click="fetchTeachers">اطلاع رسانی به
                    اساتید</button>
                <button class="focus:outline-none bg-indigo-600 p-3 text-white rounded hover:bg-indigo-400"
                    @click="showEmployees= true,showTeachers= false" wire:click="employees">اطلاع رسانی به کارمندان</button>
            </div>
            @include('components.totats')
            <div class="bg-white" x-show="showEmployees || showTeachers">
                <input type="text" class="bg-gray-100 p-2 m-2 rounded focus:outline-none" wire:model="search" placeholder="جستجو">
                @if ($teachers)
                    <div>
                        @include('livewire.awearness.teacher-awearness')
                    </div>
                    @elseif($employee)
                    <div>
                        @include('livewire.awearness.employee-awearness')
                    </div>
                @endif
               
            </div>
        </div>
    </div>
</div>
