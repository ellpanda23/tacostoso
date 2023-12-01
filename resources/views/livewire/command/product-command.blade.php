<div class='container flex items-center justify-center px-2'>
    <div class='max-w-md pb-2 mx-auto overflow-hidden bg-gray-100 rounded-lg dark:bg-slate-700'>
        @isset($product->image)
            <img class="object-cover w-full h-48 rounded" src="{{ asset($product->image) }}" alt="{{ $product->slug }}">
        @else
            <img class="object-cover w-full h-48 rounded"
                src="https://img.freepik.com/free-photo/pasta-spaghetti-with-shrimps-sauce_1220-5072.jpg?w=2000&t=st=1678041911~exp=1678042511~hmac=e4aa55e70f8c231d4d23832a611004f86eeb3b6ca067b3fa0c374ac78fe7aba6"
                alt="Sunset in the mountains">
        @endisset
        <div class='p-4 sm:p-6'>
            <p class='font-bold text-gray-700 dark:text-gray-100 text-[22px] leading-7 mb-1'>{{ $product->name }}</p>
            <div class='flex flex-row'>
                <p class='text-[17px] font-bold text-[#0FB478]'>${{ $product->cost }}
                    {{ $product->countable == 1 ? $product->metric : '' }}</p>
            </div>
            <p class='text-[#7C7C80] dark:text-gray-400 font-[15px] mt-3'>
                {{ Str::limit($product->description, 30, '...') }}
            </p>

            @if ($product->countable != 1)
                <div x-data="{ quantity: @entangle('quantity') }" class="w-full">
                    <label for="quantity"
                        class="w-full text-sm font-semibold text-gray-700 dark:text-white">Cantidad</label>
                    <div class="relative flex flex-row w-full h-10 mt-1 bg-transparent rounded-lg">
                        <button wire:click="decrementQuantity"
                            class="w-20 h-full {{ $quantity == 1 ? 'disabled bg-gray-400 cursor-not-allowed' : '' }} text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer hover:text-gray-700 hover:bg-gray-400"
                            :disabled="quantity <= 1">
                            <span class="m-auto text-2xl font-thin">−</span>
                        </button>
                        {!! Form::number('quantity', $quantity, [
                            'x-bind:value' => 'quantity',
                            'wire:model' => 'quantity',
                            'inputmode' => 'numeric',
                            'class' =>
                                'flex items-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none focus:outline-none text-md hover:text-black focus:text-black md:text-base cursor-default',
                            'x-on:input' => 'if ($event.target.value <= 0) $dispatch("input", 1);',
                        ]) !!}
                        <button wire:click="incrementQuantity"
                            class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                            <span class="m-auto text-2xl font-thin">+</span>
                        </button>
                    </div>
                    {{-- <a class="text-blue-500 cursor-pointer" wire:click="$emit('instruction')">Agregar instrucción</a> --}}

                    <button wire:click="addProduct"
                        class="block cursor-pointer mt-4 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80">
                        Agregar producto
                    </button>

                </div>
            @else
                <span class="my-4 dark:text-white">
                    Agregar rapido
                </span>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <button class="text-sm btn btn-secondary" wire:click="setQuantity(1)">1 kg</button>
                    <button class="text-sm btn btn-secondary" wire:click="setQuantity(0.5)">1/2 kg</button>
                    <button class="text-sm btn btn-secondary" wire:click="setQuantity(0.25)">1/4 kg</button>
                </div>
                <span class="my-4 dark:text-white">
                    Personalizado
                </span>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-dollar-sign dark:text-gray-400"></i>
                        </div>

                        {!! Form::number('money', null, [
                            'class' =>
                                'bg-gray-50 pl-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                            'placeholder' => '100',
                            'wire:model' => 'money',
                        ]) !!}
                    </div>

                    <div class="flex">
                        {!! Form::number('weight', null, [
                            'class' =>
                                'rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                            'placeholder' => '100',
                            'wire:model' => 'customMetric',
                        ]) !!}
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            @switch($metric)
                                @case('Kg')
                                    gr
                                @break

                                @case(2)
                                @break

                                @default
                            @endswitch
                        </span>
                    </div>

                </div>

                <button wire:click="setQuantity({{$customMetric/1000}})"
                    class="block cursor-pointer mt-4 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80">
                    Agregar producto
                </button>

            @endif



        </div>
    </div>
    @push('js')
        {{-- <script>
            Livewire.on('instruction', () => {
                Swal.fire({
                    title: '¿Cual es la instrucción?',
                    input: 'textarea',
                    inputAttributes: {
                        autocapitalize: 'off',
                        autocomplete: 'off'
                    },
                    showCancelButton: true,
                    footer: 'Recuerda que debés dar clic en "Agregar producto"',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Ok',
                    showLoaderOnConfirm: true,
                    customClass: {
                        footer: 'text-sm text-gray-600 text-center'
                    },
                    preConfirm: (keyword) => {
                        Livewire.emitTo('command.product-command', 'setInstruction', keyword);
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });
            });
        </script> --}}
    @endpush

</div>
