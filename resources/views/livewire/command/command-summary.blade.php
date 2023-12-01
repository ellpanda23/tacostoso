<div>

    <div class="fixed z-50 cursor-pointer bottom-4 right-4">
        <a wire:click="$set('open', true)"
            class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="text-xl fas fa-shopping-cart"></i>
            <span class="sr-only">Notifications</span>
            <div
                class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                {{ count($selectedProducts) }}
            </div>
        </a>
    </div>

    <x-modal wire:model="open" maxWidth="5xl">
        <svg wire:click="$set('open', false)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor"
            class="absolute w-5 h-5 duration-150 cursor-pointer dark:text-white top-4 right-4 hover:text-red-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>

        <body>
            <div class="h-screen p-4 pt-8 overflow-scroll bg-gray-100 dark:bg-slate-800">
                <h1 class="mb-10 text-2xl font-bold text-center dark:text-white">Resumen de comanda</h1>
                <div class="justify-center max-w-5xl px-6 mx-auto md:flex md:space-x-6 xl:px-0">
                    <div class="rounded-lg md:w-2/3">
                        @if (!empty($selectedProducts))
                            @for ($i = 0; $i < count($selectedProducts); $i++)
                                <div
                                    class="justify-between p-6 mb-6 bg-white rounded-lg shadow-md dark:text-white dark:bg-slate-700 sm:flex sm:justify-start">
                                    @isset($selectedProducts[$i]['image'])
                                        <img src="{{$selectedProducts[$i]['image']}}"
                                        alt="{{ $selectedProducts[$i]['name'] }}" class="w-full rounded-lg sm:w-40" />
                                    @else
                                        <img src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                        alt="product-image" class="w-full rounded-lg sm:w-40" />
                                    @endisset
                                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                        <div class="mt-5 sm:mt-0">
                                            <h2 class="text-lg font-bold text-gray-900 dark:text-white">
                                                {{ $selectedProducts[$i]['name'] }}</h2>
                                            {{-- @if ($selectedProducts[$i]['instruction'])
                                                <p>{{ $selectedProducts[$i]['instruction'] }}</p>
                                                <a class="text-blue-500 cursor-pointer"
                                                    wire:click="setInstruction({{ $i }})">Actualizar
                                                    instrucciones</a>
                                            @else
                                                <a class="text-blue-500 cursor-pointer"
                                                    wire:click="setInstruction({{ $i }})">Agregar
                                                    instruccion</a>
                                            @endif --}}
                                        </div>
                                        <div
                                            class="flex justify-between mt-4 sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                            @isset($selectedProducts[$i]['metric'])
                                                @switch($selectedProducts[$i]['metric'])
                                                    @case('Kg')
                                                        {{ $selectedProducts[$i]['quantity'] >= 1 ? $selectedProducts[$i]['quantity'] . 'kg' : $selectedProducts[$i]['quantity'] * 1000 . 'gr' }}
                                                    @break

                                                    @case(2)
                                                    @break

                                                    @default
                                                @endswitch
                                            @else
                                                <div class="flex items-center border-gray-100">
                                                    <span wire:click='decrementQuantity({{ $i }})'
                                                        class="cursor-pointer rounded-l bg-gray-100 dark:bg-gray-600 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                        - </span>
                                                    <input
                                                        class="w-10 h-8 text-xs text-center bg-white border outline-none dark:bg-gray-500"
                                                        type="number" disabled
                                                        value="{{ $selectedProducts[$i]['quantity'] }}" min="1" />
                                                    <span wire:click='incrementQuantity({{ $i }})'
                                                        class="px-3 py-1 duration-100 bg-gray-100 rounded-r cursor-pointer dark:bg-gray-600 hover:bg-blue-500 hover:text-blue-50">
                                                        + </span>
                                                </div>
                                            @endisset
                                            <div class="flex items-center space-x-4">
                                                <p class="text-sm">${{ $selectedProducts[$i]['cost'] }} MXN</p>
                                                <svg wire:click="removeProduct({{ $i }})"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 duration-150 cursor-pointer hover:text-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>

                    {{-- {{$actualOrder}} --}}

                    <div
                        class="h-full p-6 mt-6 bg-white border rounded-lg shadow-md dark:border-none dark:bg-slate-700 md:mt-0 md:w-1/3">
                        {{-- {!! Form::select('table_id', $tables, null, [
                            'class' => 'form-input w-full',
                            'wire:model' => 'table',
                            'placeholder' => 'Selecciona una mesa',
                        ]) !!} --}}
                        <button wire:click="checkOut"
                            class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Confirmar
                            Orden</button>
                    </div>
                </div>
            </div>
        </body>

    </x-modal>

    @push('js')
        <script>
            Livewire.on('instructionSummary', (instruction, index) => {
                Swal.fire({
                    title: '¿Cuál es la instrucción?',
                    input: 'textarea',
                    inputValue: instruction, // Carga el texto predeterminado en el textarea
                    inputAttributes: {
                        autocapitalize: 'off',
                        autocomplete: 'off'
                    },
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Actualizar',
                    showLoaderOnConfirm: true,
                    preConfirm: (keyword) => {
                        Livewire.emitTo('command.command-summary', 'updateInstruction', keyword, index);
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });
            });
        </script>
    @endpush



</div>
