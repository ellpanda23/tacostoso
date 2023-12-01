<div>
    <div class="card">
        <div class="card-body">

            <body class="font-sans antialiased bg-gray-200">
                <div class="container px-4 mx-auto sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight dark:text-gray-100">Lista de comandas</h2>
                        </div>

                        <div class="flex items-center py-4">

                            <x-input class="flex-1 p-2 mr-4 border rounded" placeholder="Escribe lo que quieres buscar"
                                wire:model="search" />

                            <a href="{{ route('commands.create') }}" class="btn btn-danger">Crear comanda</a>

                        </div>

                        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 cursor-pointer"
                                                wire:click="order('id')">
                                                Folio

                                                {{-- Sort --}}
                                                @if ($sort == 'id')
                                                    @if ($direction == 'asc')
                                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                                    @else
                                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                                    @endif
                                                @else
                                                    <i class="float-right mt-1 fas fa-sort"></i>
                                                @endif

                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Responsable
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Mesa
                                            </th>
                                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 cursor-pointer"
                                                wire:click="order('status')">
                                                Estado

                                                {{-- Sort --}}
                                                @if ($sort == 'estatus')
                                                    @if ($direction == 'asc')
                                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                                    @else
                                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                                    @endif
                                                @else
                                                    <i class="float-right mt-1 fas fa-sort"></i>
                                                @endif
                                            </th>
                                            <th colspan="4"
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($commands as $command)
                                            <tr>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{ $command->id }}</p>
                                                </td>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    {{ $command->user->name }}
                                                </td>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    {{$command->table->name}}
                                                </td>
                                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                    Activo
                                                </td>
                                                <td class="bg-white border-b border-gray-200">
                                                    <a href="{{ route('commands.checkout', $command) }}">
                                                        <i class="text-xl text-green-500 fas fa-dollar-sign hover:text-green-800"></i>
                                                    </a>
                                                </td>
                                                <td class="bg-white border-b border-gray-200">
                                                    <a href="{{ route('commands.show', $command) }}">
                                                        <i
                                                            class="text-xl text-gray-600 fas fa-eye hover:text-gray-800"></i>
                                                    </a>
                                                </td>
                                                <td class="bg-white border-b border-gray-200">
                                                    <a href="{{ route('commands.edit', $command) }}">
                                                        <i
                                                            class="text-xl text-blue-500 fas fa-pencil-alt hover:text-blue-800"></i>
                                                    </a>
                                                </td>
                                                <td class="bg-white border-b border-gray-200">
                                                    <i class="text-xl text-red-500 cursor-pointer fas fa-trash-alt hover:text-red-800"
                                                        wire:click="$emit('deletecommand', {{ $command->id }})"></i>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="7">
                                                No hay ninguna comanda todavía.
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- <div
                                    class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                                    <span class="text-xs text-gray-900 xs:text-sm">
                                        Showing 1 to 4 of 50 Entries
                                    </span>
                                    <div class="inline-flex mt-2 xs:mt-0">
                                        <button
                                            class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-l hover:bg-gray-400">
                                            Prev
                                        </button>
                                        <button
                                            class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-r hover:bg-gray-400">
                                            Next
                                        </button>
                                    </div>
                                </div> --}}
                                <div>
                                    {{ $commands->links() }}
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
            Livewire.on('deletecommand', commandId => {

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

                        Livewire.emitTo('commands.show-commands', 'delete', commandId);

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
