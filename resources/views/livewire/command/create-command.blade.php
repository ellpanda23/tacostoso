<div>
    <div class="card">

        <div class="card-header">
            @livewire('command.command-summary')

            <div class="grid grid-cols-1 gap-1 md:py-4 md:flex md:items-center">

                <x-input class="border rounded md:p-2 md:flex-1" placeholder="Escribe lo que quieres buscar"
                    wire:model="search" />

                    {!! Form::select('categories', $categories, null, ['class' => 'form-control rounded-md bg-gray-500 dark:text-white', 'wire:model' => 'category']) !!}

            </div>

        </div>

        <div class="card-body">

            <div class="py-8">
                @if (count($products) != 0)
                    <div class="grid grid-cols-1 gap-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($products as $product)
                            @livewire('command.product-command', ['product' => $product, 'command' => $command], key($product->id))
                        @endforeach
                    </div>
                @else
                    <div class="w-full text-center">
                        <span class="dark:text-white">
                            No hay ningún producto disponible de esta categoría.
                        </span>
                    </div>
                @endif
            </div>


        </div>
        <div class="card-footer">
            <div class="flex items-center justify-center">
                {{$products->links()}}
                <div class="flex-1"></div>
            </div>
        </div>
    </div>

</div>
