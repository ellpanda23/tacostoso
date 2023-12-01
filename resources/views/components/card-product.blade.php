@props(['product'])

<!-- component -->
<!-- This is an example component -->
<div
    class='container flex items-center justify-center px-2'>
    <div class='max-w-md pb-2 mx-auto overflow-hidden bg-gray-100 rounded-lg dark:bg-slate-700'>
        @isset ($product->image)
            <img class="object-cover w-full h-48 rounded"
                src="{{asset($product->image)}}"
                alt="{{$product->slug}}">
        @else
            <img class="object-cover w-full h-48 rounded"
                src="https://img.freepik.com/free-photo/pasta-spaghetti-with-shrimps-sauce_1220-5072.jpg?w=2000&t=st=1678041911~exp=1678042511~hmac=e4aa55e70f8c231d4d23832a611004f86eeb3b6ca067b3fa0c374ac78fe7aba6"
                alt="Sunset in the mountains">
        @endisset
        <div class='p-4 sm:p-6'>
            <p class='font-bold text-gray-700 dark:text-gray-100 text-[22px] leading-7 mb-1'>{{$product->name}}</p>
            <div class='flex flex-row'>
                <p class='text-[17px] font-bold text-[#0FB478]'>${{$product->cost}}</p>
            </div>
            <p class='text-[#7C7C80] dark:text-gray-400 font-[15px] mt-3'>{{$product->description}}
            </p>

            <!-- component -->
            <div class="w-full" x-data="{ count: 1 }">
                <label for="count" class="w-full text-sm font-semibold text-gray-700">Counter Input
                </label>
                <div class="relative flex flex-row w-full h-10 mt-1 bg-transparent rounded-lg">
                    <button @click="if (count > 1) { count-- }"
                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    {{-- TODO ADD LARAVEL COLLECTIVE INPUTS --}}
                    <input type="number"
                        class="flex items-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default"
                        name="count" x-model="count" inputmode="numeric" />
                    <button @click="count++"
                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                        <span class="m-auto text-2xl font-thin">+</span>
                    </button>

                    {{-- VALIDATION MESSAGE --}}
                    {{-- <div
                            class="absolute flex flex-col items-start justify-center w-32 p-2 mt-10 md:w-full md:mt-8">
                            <svg width="10" height="10" class="ml-5 fill-current md:mx-auto">
                                <polygon points="0 10, 10 10, 5 0" />
                            </svg>
                            <span
                                class="flex flex-wrap justify-center block w-48 h-auto p-3 text-xs text-white bg-black rounded-lg">Input
                                validation message</span>
                        </div> --}}
                </div>

                <a {{$attributes->merge(['class' => 'block cursor-pointer mt-4 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'])}} >
                    Agregar
                </a>

            </div>
        </div>
    </div>
</div>
