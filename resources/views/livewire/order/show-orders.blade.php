<div>
    <div class="card">
        <div class="card-body">

            <body class="font-sans antialiased bg-gray-200">
                <div class="container px-4 mx-auto sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight dark:text-white">Ordenes</h2>
                        </div>

                        <div class="flex items-center py-4">

                            <x-input class="flex-1 p-2 mr-4 border rounded" placeholder="Escribe lo que quieres buscar"
                                wire:model="search" />

                                {!! Form::select('categories', $categories, null, ['class' => 'form-control rounded-md bg-gray-500 dark:text-white', 'wire:model' => 'category']) !!}

                            {{-- <div class="md:mx-4">
                                <!-- component -->
                                <div x-data="{ open: false }" class="relative w-full mt-2 md:mt-0 md:w-40"
                                    @click.outside="open = false" x-ref="dropdownDiv">
                                    <button @click="open = !open" :class="(open) && 'ring-blue-600'"
                                        class="flex items-center justify-between w-full p-2 bg-white rounded dark:text-white dark:bg-gray-600 ring-1 dark:ring-gray-500 ring-gray-300">
                                        <span>{{ $category->name }}</span>
                                        <i class="text-xl fas fa-chevron-down"></i>
                                    </button>

                                    <ul class="fixed w-full mt-1 rounded z-2 bg-gray-50 ring-1 ring-gray-300"
                                        x-show="open" :style="{ width: $refs.dropdownDiv.offsetWidth + 'px' }">
                                        @foreach ($categories as $item)
                                            <li class="p-2 cursor-pointer select-none hover:bg-gray-200"
                                                @click="open = false" wire:click="updateCategory({{ $item }})">
                                                {{ $item->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> --}}

                        </div>

                        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 cursor-pointer"
                                                wire:click="order('id')">
                                                Folio

                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Responsable
                                            </th>
                                            <th
                                                class="w-px text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Cantidad
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Producto
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Mesa
                                            </th>
                                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 cursor-pointer"
                                                wire:click="order('status')">
                                                Estado
                                            </th>
                                            <th colspan="4"
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{ $order->id }}</p>
                                                </td>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    {{ $order->user->name }}
                                                </td>
                                                <td class="w-px text-sm text-center bg-white border-b border-gray-200">
                                                    @if ($order->product->countable == 1)
                                                    @switch($order->product->metric)
                                                        @case('Kg')
                                                            {{ $order->quantity >= 1 ? $order->quantity . 'kg' : $order->quantity * 1000 . 'gr' }}
                                                            @break
                                                        @case(2)

                                                            @break
                                                        @default

                                                    @endswitch
                                                    @else
                                                        {{ $order->quantity }}
                                                    @endif
                                                </td>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    <p>
                                                        {{ $order->product->name }}
                                                    </p>

                                                    @if ($order->instruction)
                                                        <a class="text-blue-500 cursor-pointer"
                                                            wire:click="showInstruction({{ $order }})">Mostar
                                                            intrucción</a>
                                                    @endif
                                                </td>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    {{ $order->table->name }}
                                                </td>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    Pendiente
                                                </td>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    <i class="text-xl text-green-500 cursor-pointer fas fa-check hover:text-green-800"
                                                        wire:click="finishOrder({{ $order->id }})"></i>
                                                </td>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    <i
                                                        class="text-xl text-red-500 cursor-pointer fas fa-trash-alt hover:text-red-800"></i>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No hay ninguna orden de esta categoria</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div>
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </body>
        </div>
    </div>

    @push('js')
        <script>
            Livewire.on('deleteorder', orderId => {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger mr-2'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('orders.show-orders', 'delete', orderId);

                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                })

            });
        </script>
    @endpush

</div>
