@if (Session::has('deletemessage'))
    <div class="" x-data="{open:true}">
        <div x-show="open" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transfrom scale-100"
            x-transition:leave-end="opacity-0 transfrom scale-90"
            class="shadow-2xl m-5 bg-red-500 text-white p-3 rounded-lg  text-white">

            <div id="toast-success " role="alert">
                <div class="pb-3">
                    <div class=" text-md font-normal float-right">{{ session::get('deletemessage') }}</div>
                    <button @click="open=false" class="float-left bg-red-500 px-2  mb-1 rounded ">&times;</button>
                </div>
            </div>
        </div>
    </div>
@endif
