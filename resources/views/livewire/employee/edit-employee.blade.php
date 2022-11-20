<div x-data="{ ifImgSelected: false }">
    <div class="">
        <div class=" w-full mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
            <p class="text-blue-700 text-bold p-2">
                بروز رسانی معلومات حساب کاربری
            </p>
            <hr>
            <div class=" bg-white rounded ">

                <div class="grid grid-cols-4 ">

                    <form class="col-span-3" action="{{ route('employee.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="">
                            @csrf
                            @method('patch')
                            <div class="grid grid-cols-2 gap-2">

                                <div class="p-2">
                                    <div class="flex flex-wrap">
                                        <label for="name"
                                            class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __(' نام') }}:
                                        </label>

                                        <input id="name" type="text"
                                            class="form-input w-full @error('name') border-red-500 @enderror"
                                            name="name" value="{{ $user->name }}" required autocomplete="name"
                                            autofocus>
                                        @error('name')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="flex flex-wrap">
                                        <label for="lname"
                                            class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('تحلض') }}:
                                        </label>

                                        <input id="lname" type="text"
                                            class="form-input w-full @error('lname') border-red-500 @enderror"
                                            name="lname" value="{{ $user->lname }}" required autocomplete="lname"
                                            autofocus>

                                        @error('lname')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>


                                </div>
                                <div class="p-2">
                                    {{-- <div class="flex flex-wrap">
                                        <label for="emp_phone"
                                            class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __('شماره تماس') }}:
                                        </label>
    
                                        <input id="emp_phone" type="text"
                                            class="form-input w-full @error('emp_phone')  border-red-500 @enderror"
                                            name="emp_phone" value="{{ $emp_phone }}" required
                                            autocomplete="emp_phone" autofocus>
    
                                        @error('emp_phone')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div> --}}
                                    <div class="flex flex-wrap">
                                        <label for="email"
                                            class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __(' ایمیل') }}:
                                        </label>

                                        <input id="email" type="email"
                                            class="form-input w-full @error('email') border-red-500 @enderror"
                                            name="email" required value="{{ $user->email }}">

                                        @error('email')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="flex flex-wrap">
                                        <label for="image"
                                            class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-2">
                                            {{ __(' عکس') }}:
                                        </label>

                                        <input id="choseenImag" type="file" x-on:change="ifImgSelected=true"
                                            class="form-input w-full @error('image') border-red-500 @enderror"
                                            name="image" wire:change="$emit('imageSelected')">

                                        @error('image')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>
                                </div>


                            </div>
                            <div class="flex flex-wrap pb-2 mr-3">
                                <button type="submit mb-2"
                                    class="w-m select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-2">
                                    {{ __('بروز رسانی کردن') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <img src="{{ asset('asset/upload/image') }}/{{ $user->image }}" id="isImageSelected"
                        class="  my-5 p-0" width="200px">
                </div>

            </div>
        </div>
        {{-- <div width="180px"
            class="float-left border-blue-300 border-2  overflow-hidden mt-2 shadow  shadow-xl rounded shadow bg-gray-200 text-center rounded">
            <div class=" bg-white rounded w-full rounded">
                <img src="{{ asset('asset/upload/image') }}/{{ $user->image }}" id="isImageSelected"
                    class=" m-0 p-0" width="200px">
            </div>
        </div> --}}
    </div>


</div>
<script>
    window.livewire.on('imageSelected', () => {
        let selectedImage = document.getElementById('choseenImag');
        let file = selectedImage.files[0];
        let reader = new FileReader();
        reader.onload = () => {
            // alert(reader.result);
            // console.log();
            let isImageSelected = document.getElementById('isImageSelected');
            isImageSelected.src = reader.result;
        }
        reader.readAsDataURL(file);
    })
</script>
