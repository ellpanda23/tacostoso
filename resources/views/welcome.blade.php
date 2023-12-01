<x-guest-layout>
    <header>

        <div class="px-2 py-4 lg:mx-4 xl:mx-12 ">
            <div class="">
                <nav class="flex flex-wrap items-center justify-between ">
                    <div id="main-nav" class="items-center flex-grow hidden w-full lg:flex lg:w-auto ">
                        <div class="mt-2 text-sm lg:flex-grow animated jackinthebox xl:mx-8">
                            <a href="#home"
                                class="block p-1 mx-2 font-bold text-orange-500 rounded-lg lg:inline-block text-md sm:hover:border-indigo-400 hover:text-orange-500 focus:text-blue-500 hover:bg-gray-300 sm:hover:bg-transparent">
                                Taconmadres
                            </a>
                            <a href="#order_now"
                                class="block p-1 mx-2 font-bold text-gray-900 rounded-lg lg:inline-block text-md sm:hover:border-indigo-400 hover:text-orange-500 focus:text-blue-500 hover:bg-gray-300 sm:hover:bg-transparent">
                                Ordena ahora
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </header>

    <div class="relative bg-gray-100">
        <img src="https://images.pexels.com/photos/5454019/pexels-photo-5454019.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="imagen de fondo" class="object-cover w-full h-screen ">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute flex inset-0 px-4 mx-auto text-center text-white max-w-7xl">
            <div class="my-auto">
                <h1 class="text-2xl font-medium md:text-5xl">¡Deléitate en una de las mejores</h1>
                <p class="mb-12 text-4xl md:text-7xl">taquerías en Uriangato, Guanajuato!</p>
                <!-- component -->
                <a href="#order_now" class="relative w-48 h-12 overflow-hidden text-lg rounded-lg shadow btn group">
                    <div
                        class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                    </div>
                    <span class="relative text-white group-hover:text-white">¡Haz tu pedido!</span>
                </a>
            </div>
        </div>
    </div>

    <div id="order_now" class="mx-12" >
        <div class="mb-4 text-black mx-auto px-4 py-12 text-center">
            <h1 class="text-4xl font-semibold">Lo que te ofrecemos:</h1>
        </div>
        <div>

            @livewire('command.create-command')
            
        </div>
    </div>
    
    <div class="py-12 mx-12">
        <div>
            <h1 class="mb-6 text-4xl font-semibold text-center">Visitanos en:</h1>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59934.13336318768!2d-101.21789301229536!3d20.1389142117939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cfac6125d8345%3A0xb5b485d7b3358697!2sUriangato%2C%20Gto.!5e0!3m2!1ses-419!2smx!4v1682308924236!5m2!1ses-419!2smx"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="text-black" id="buy">
            <h1 class="text-4xl font-semibold">¿Quieres comer algo delicioso?</h1>
            <p class="text-2xl">Haz tu pedido ahora al <b class="font-bold">123-456-78-90</b></p>
        </div>
    </div>

    <footer class="relative pt-8 pb-6 text-white bg-orange-800">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap text-left lg:text-left">
                <div class="w-full px-4 lg:w-6/12">
                    <h4 class="text-3xl fonat-semibold text-blueGray-700">Taquería Uriangato</h4>
                    <h5 class="mt-0 mb-2 text-lg text-blueGray-600">
                        Los mejores tacos de la ciudad.
                    </h5>
                    <div class="mt-6 mb-6 lg:mb-0">
                        <button
                            class="items-center justify-center w-10 h-10 mr-2 font-normal bg-white rounded-full shadow-lg outline-none text-lightBlue-400 align-center focus:outline-none"
                            type="button">
                            <i class="fab fa-twitter"></i></button><button
                            class="items-center justify-center w-10 h-10 mr-2 font-normal bg-white rounded-full shadow-lg outline-none text-lightBlue-600 align-center focus:outline-none"
                            type="button">
                            <i class="fab fa-facebook-square"></i></button><button
                            class="items-center justify-center w-10 h-10 mr-2 font-normal text-pink-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none"
                            type="button">
                            <i class="fab fa-dribbble"></i></button><button
                            class="items-center justify-center w-10 h-10 mr-2 font-normal bg-white rounded-full shadow-lg outline-none text-blueGray-800 align-center focus:outline-none"
                            type="button">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-6/12">
                    <div class="flex flex-wrap mb-6 items-top">
                        <div class="w-full px-4 ml-auto lg:w-4/12">
                            <span class="block mb-2 text-sm font-semibold uppercase text-blueGray-500">Useful
                                Links</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="https://www.creative-tim.com/presentation?ref=njs-profile">About Us</a>
                                </li>
                                <li>
                                    <a class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="https://blog.creative-tim.com?ref=njs-profile">Blog</a>
                                </li>
                                <li>
                                    <a class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="https://www.github.com/creativetimofficial?ref=njs-profile">Github</a>
                                </li>
                                <li>
                                    <a class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-profile">Free
                                        Products</a>
                                </li>
                            </ul>
                        </div>
                        <div class="w-full px-4 lg:w-4/12">
                            <span class="block mb-2 text-sm font-semibold uppercase text-blueGray-500">Other
                                Resources</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-profile">MIT
                                        License</a>
                                </li>
                                <li>
                                    <a class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="https://creative-tim.com/terms?ref=njs-profile">Terms &amp; Conditions</a>
                                </li>
                                <li>
                                    <a class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="https://creative-tim.com/privacy?ref=njs-profile">Privacy Policy</a>
                                </li>
                                <li>
                                    <a class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="https://creative-tim.com/contact-us?ref=njs-profile">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-blueGray-300">
            {{-- <div class="flex flex-wrap items-center justify-center md:justify-between">
        <div class="w-full px-4 mx-auto text-center md:w-4/12">
            <div class="py-1 text-sm font-semibold text-blueGray-500">
                Copyright © <span id="get-current-year">2021</span><a
                    class="text-blueGray-500 hover:text-gray-800" > Notus JS by
                    <a href="https://www.creative-tim.com?ref=njs-profile"
                        class="text-blueGray-500 hover:text-blueGray-800">Creative Tim</a>.
            </div>
        </div>
    </div> --}}
        </div>
    </footer>
    
</x-guest-layout>
