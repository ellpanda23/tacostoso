<div>
    <div class="h-full py-10 bg-gray-100 dark:bg-slate-700">
        <h1 class="mb-10 text-2xl font-bold text-center dark:text-white">Resumen de comanda</h1>
        <div class="justify-center max-w-5xl px-6 mx-auto md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                @foreach ($orders as $order)
                    <div
                        class="justify-between p-6 mb-6 bg-white rounded-lg shadow-md dark:bg-slate-800 sm:flex sm:justify-start">
                        @isset($order->product->image)
                            <img src="{{$order->product->image}}"
                                alt="{{$order->product->name}}" class="w-full rounded-lg sm:w-40" />
                        @else
                            <img src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                alt="order-image" class="w-full rounded-lg sm:w-40" />
                        @endisset
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-0">
                                <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                    {{ $order->quantity }}x {{ $order->product->name }}</h2>
                                <p class="mt-1 text-xs text-gray-700 dark:text-gray-200">
                                    {{ $order->product->description }}</p>
                                @if ($order->instruction)
                                    <p class="mt-1 text-sm text-blue-600">Instrucciones</p>
                                    <p class="mt-1 text-xs text-gray-700 dark:text-gray-200">
                                        {{ $order->instruction }}</p>
                                @endif
                            </div>
                            <div class="flex justify-end mt-4 sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                <div class="text-right dark:text-gray-100">
                                    <p class="text-sm">Precio unitario: ${{ $order->product->cost }}</p>
                                    <p class="text-xl font-bold">Total:
                                        ${{ $order->product->cost * $order->quantity }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div>
                    {{$orders->links()}}
                </div>
            </div>
            <!-- Sub total -->
            <div
                class="h-full p-6 mt-6 bg-white border rounded-lg shadow-md dark:border-none dark:bg-slate-800 md:mt-0 md:w-1/3">
                <div class="flex justify-between mb-2">
                    <p class="text-gray-700 dark:text-gray-200">No. productos</p>
                    <p class="font-semibold text-gray-700 dark:text-gray-100">{{ $noProducts }}</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-gray-700 dark:text-gray-200">Atendio</p>
                    <p class="font-semibold text-gray-700 dark:text-gray-100">{{ $command->user->name }}</p>
                </div>
                <hr class="my-4" />
                <div class="flex justify-between">
                    <p class="text-lg font-bold dark:text-gray-100">Total</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold dark:text-gray-100">${{ $cost }} MXN</p>
                        <p class="text-sm text-gray-700 dark:text-gray-300">Incluye IVA</p>
                    </div>
                </div>
                @if ($command->status == 1)
                    <div>
                        <p class="dark:text-gray-100">Cantidad recibida</p>
                        {!! Form::number('paidWith', $paidWith, [
                            'class' => 'form-input w-full',
                            'wire:model' => 'paidWith',
                            'inputmode' => 'numeric',
                        ]) !!}
                        <div class="flex justify-between">
                            <p class="dark:text-gray-100">Cambio</p>
                            <p class="dark:text-gray-100">${{$paidWith != null ? $paidWith - $cost : '0'}}</p>
                        </div>
                    </div>
                @endif
                @if ($command->status == 1)
                    <button wire:click='paidCommand'
                        class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">
                        Pagar
                    </button>
                @else
                    <button class="mt-6 w-full rounded-md bg-gray-500 py-1.5 font-medium text-blue-50" disabled>
                        Pagado
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
