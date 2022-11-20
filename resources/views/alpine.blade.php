@extends('layouts.app')

@section('content')
@push('styles')
    <style>
       .modal {
            width: 400px;
            padding: 20px;
            margin: 100px auto;
            background: #fff;
            border-radius: 10px;
        }

        .backdrop {
            top: 0;
            position: fixed;
            background: rgba(12, 45, 52, 0.5);
            width: 100%;
            /* overflow: hidden; */
            /* height: 100%; */
        }
    </style>
@endpush
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                alpine js x-text
            </header>
            <div  x-data="{ 'showModal': false }">
    
                <div class="backdrop" x-show="showModal">
                    <div class="modal">
                        <p>modal contents</p>
                    </div>
                </div>
                <button @click="showModal = true"> show my custom modal</button>
            </div>
        </section>
       
        <div class="grid  lg:grid-cols-2 md:grid-cols-1 lg:gap-2 md:gap-1  ">
            <div class="w-full mt-6 rounded-lg sm:shadow-sm sm:shadow-lg bg-gray-200 text-center hover:bg-sky-700 ">
                <h2 class="text-gray-700 mb-3 p-1 text-bold"> first way of using   x-text  </h2>
                <img
                class="object-cover w-full h-48"
                src="https://cdn.pixabay.com/photo/2016/12/19/18/21/snowflake-1918794__340.jpg"
                alt="image"/>
                <div class="px-6 py-4" x-data="{message: ' Alpine js is very awesome i want to use this '}">
                    <p x-text="message" class=" mb-2"></p>
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-sky-600">
                        Christmas Tree Decoration
                    </h4>
                    <p class="mb-2 leading-normal text-sky-900">
                        Lorem ipsum dolor, sit amet cons ectetur adipis icing elit. Praesen tium,
                        quibusdam facere quo laborum maiores sequi nam tenetur laud.
                    </p>
                    <button
                    class="px-4 py-2 text-sm shadow bg-sky-100 shadow-sky-600 text-sky-700 
                    hover:bg-sky-600 hover:text-sky-100">
                    Read more
                </button>
            </div>
            </div>
            <div class="w-full mt-6 rounded-lg shadow-sm shadow-xl bg-gray-200 tex-center" x-data="{counter:0}">
                <h2 class="text-gray-700 mb-3 p-1 text-blod">second way of using x-text</h2>
                <img class="object-cover w-full h-48" src="https://cdn.pixabay.com/photo/2016/12/19/18/21/snowflake-1918794__340.jpg" alt="">
                <div class="px-6 py-4">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-sky-600">
                        chritmas tree decoration
                    </h4>
                    <hr>
                    <p x-text="counter"></p>
                    <hr>
                    <p class="mb-2 leading-normal text-blue-400">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident excepturi dolor optio qui eius non. Laborum architecto quidem ea non cum esse? Maiores fuga molestias et cumque rerum! Ipsam, enim.
                    </p>
                    <button @click="counter++" class="px-4 py-2 rounded text-sm shadow bg-blue-300 text-blue-700 hover">
                        increment
                    </button>
                    <button @click="counter--" class="px-4 py-2 rounded shadow text-sm bg-orange-300 text-blue-700 hover">
                        decrement
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-3 mb-15 grid lg:grid-cols-2  md:grid-cols-1 lg:gap-2 md:gap-1">
            <div class="w-full mt-2 rounded shadow bg-gray-200 text-center">
                <p class="text-blue-700 text-bold p-2">
                    x-text thrid way
                </p>
                <hr>
                <div class="px-6 py-4 bg-gray-50 ">
                    <h4 class="mb-3 text-sm font-bold tracking-tight text-success">working with for loop in alpine js</h4>                    
                    <ul x-data="employee" role="list" class="p-6 divide-y       divide-gray-200 text-gray-800" >
                        <template x-for="person in people" :key="person.id">
                            <li class="flex py-4 first:pt-0 last:pb-0">
                                <img
                                
                               :src="person.image"
                                
                                 class="h-10 w-10 rounded-full"  alt="">
                                
                                <div class="ml-3 overflow-hidden">
                                    <p x-text="person.email" class="text-sm font-medium text-sm font-medium text-orange-900">
                                        
                                    </p>
                                    <p x-text="person.name" class="text-sm ">
                                        
                                    </p>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
        <div
  x-data="{ 'showModal': false }"
  @keydown.escape="showModal = false"
>
    <!-- Trigger for Modal -->
    <button type="button" @click="showModal = true">Open Modal</button>

    <!-- Modal -->
    <div
        class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show="showModal"
    >
        <!-- Modal inner -->
        <div
            class="w-1/2 px-6 py-4 mx-auto text-left bg-white rounded shadow-lg"
            @click.away="showModal = false"
            x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
        >
            <!-- Title / Close-->
            <div class="flex items-center justify-between">
                <h5 class="mr-3 text-black max-w-none">Title</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- content -->
            <div>
                <form>
                    <div class="mb-6">
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                      <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
                    </div>
                    <div class="mb-6">
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
                      <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="flex items-start mb-6">
                      <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
                      </div>
                      <div class="ml-3 text-sm">
                        <label for="remember" class="font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                      </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
        

</div>
<hr>

<div class="flex">
    <Editor bind:html={html}>
    <textarea name="" id="" cols="30" rows="10">

    
    </textarea>
    </Editor>
</div>
<hr>

<p class="mt-10">
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel reprehenderit quas dicta, quis libero aut fugiat sit natus aliquid, dolorum facere incidunt consequuntur! Consequatur qui temporibus, sapiente recusandae amet illum?
</p>
</main>
@endsection

<script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('employee', () => ({
        people: [
          { id: 1,emal:'fsdjfskd@ww.com', name: 'Jhon' ,image:'http://127.0.0.1:8000/img/img1.jpeg'},
          { id: 2,email:'dfsdj@home.com', name: 'nike' ,image:'http://127.0.0.1:8000/img/img2.jpeg'},
          { id: 3,email:'fsdjfksd@s.com',name: 'sam' ,image:'http://127.0.0.1:8000/img/img3.jpeg'},
        ],
      }));
    });
    <script>
   
</script>

