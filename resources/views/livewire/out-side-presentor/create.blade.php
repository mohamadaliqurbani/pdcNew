<div>
    <div class="w-full mb-5 rounded-lg sm:shadow-sm sm:shadow-lg bg-gray-200 text-center hover:bg-sky-700 ">
        <div class="px-6 py-4">

            <h4 class="mb-3 text-xl font-semibold tracking-tight text-sky-600">
                ثبت معلومات ارایه دهنده بیرونی
            </h4>
            <div class="grid grid-cols-4 gap-28">
                {{-- {{ $workshop->id }} --}}
                <form action="{{ route('outSidePresentor.store',$workshop->id) }}" method="POST"  class="col-span-3" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-1 sm:mb-4 text-right">
                                {{ __('اسم') }}:
                            </label>

                            <input id="name" type="text"
                                class="form-input w-full mb-1 @error('name')  border-red-500 @enderror" name="name"
                                value="{{ old('name') }}"  autofocus>
                            @error('name')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-1 sm:mb-4 text-right">
                                {{ __('تحلض') }}:
                            </label>

                            <input id="lname" type="text"
                                class="form-input w-full mb-1 @error('lname')  border-red-500 @enderror" name="lname"
                                value="{{ old('lname') }}"  autofocus>
                            @error('lname')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="education"
                                class="block text-gray-700 text-sm font-bold mb-1 sm:mb-4 text-right">
                                {{ __('رشته تحصلی') }}:
                            </label>

                            <input id="education" type="text"
                                class="form-input w-full mb-1 @error('education')  border-red-500 @enderror"
                                name="education" value="{{ old('education') }}"  autofocus>
                            @error('education')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <label for="info" class="block text-gray-700 text-sm font-bold mb-1 sm:mb-4 text-right">
                                {{ __('معلومات') }}:
                            </label>
                            <textarea name="info" id="info" cols="2" rows="2"
                                class=" form-input w-full mb-1 @error('info')  border-red-500 @enderror ">
                        {{ old('info') }}
                                </textarea>
                            @error('info')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-1 sm:mb-4 text-right">
                                {{ __('ایمیل') }}:
                            </label>

                            <input id="email" type="email"
                                class="form-input w-full mb-1 @error('email')  border-red-500 @enderror" name="email"
                                value="{{ old('email') }}"  autofocus>
                            @error('email')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-1 sm:mb-4 text-right">
                                {{ __('شماره تماس') }}:
                            </label>

                            <input id="phone" type="phone"
                                class="form-input w-full mb-1 @error('phone')  border-red-500 @enderror" name="phone"
                                value="{{ old('phone') }}"  autofocus>

                            @error('phone')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <label for="imageprofile"
                                class="block text-gray-700 text-sm font-bold mb-1 sm:mb-4 text-right">
                                {{ __('عکس') }}:
                            </label>

                            <input id="imageprofile" type="file" wire:change="$emit('imageSelected')"
                                class="form-input w-full mb-1 @error('image')  border-red-500 @enderror" name="image"
                                value="{{ old('image') }}"  autofocus>

                            @error('image')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror



                            <div class="text-right">
                                <label class="text-right text-gray-700 text-sm font-bold mb-1 sm:mb-4 text-right">
                                    {{ __('جنسیت') }}:
                                </label>
                                <label for="male" class="mr-5">مرد</label>
                                <input id="male" type="radio"
                                    class=" @error('gender')  border-red-500 @enderror text-right" name="gender"
                                    value="مرد"  autofocus>

                                <label for="female" class="mr-5">زن</label>

                                <input id="female" type="radio"
                                    class=" @error('gender')  border-red-500 @enderror text-right" name="gender"
                                    value="زن"  autofocus>


                                @error('gender')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <button class="bg-blue-700 hover:bg-blue-500 rounded p-3 mt-2 float-right text-white">ثبت
                        کردن</button>
                </form>
                <div class="">
                    <img class="col-span-1 h-48 w-full  border-2 border-white rounded" alt="" src=""
                        id="outSidePresentorImage">

                </div>
            </div>

        </div>
    </div>
</div>
<script>
    window.livewire.on('imageSelected', () => {
        let selectedImage = document.getElementById('imageprofile');

        // alert('after id')
        let file = selectedImage.files[0];
        // alert('after array')

        let reader = new FileReader();
        reader.onloadend = () => {
            // alert('in onload')
            let outSidePresentorImage = document.getElementById('outSidePresentorImage');
            outSidePresentorImage.src = reader.result;
            // alert(reader.result);
            // alert('after onload')

        }
        reader.readAsDataURL(file);
    })
</script>
