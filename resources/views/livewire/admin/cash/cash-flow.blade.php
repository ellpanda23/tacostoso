<div class="card">
    @if (session('info'))
        <div class="alert alert-success" movement="alert">
            <strong>Listo</strong> {{ session('info') }}
        </div>
    @endif

    <div class="card-header">
        @livewire('admin.cash.add-movement', ['cash' => $cash], key($cash->id))
    </div>

    <div class="card-body table-responsive">
        <thead>
            <div class="input-group">
                {!! Form::text('search', $search, [
                    'class' => 'form-control',
                    'aria-label' => 'Text input with dropdown button',
                    'wire:model' => 'search',
                    'placeholder' => 'Buscar por monto o descripción',
                ]) !!}
                <div class="input-group-append">
                    <a class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Tipo</a>
                    <div class="dropdown-menu">
                        @foreach ($transactios as $transaction)
                            <a class="pe-auto dropdown-item"
                                wire:click="$set('type', {{ $transaction->id }})">{{ $transaction->name }}</a>
                        @endforeach
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" wire:click="$set('type', '')">Todos</a>
                    </div>
                </div>
            </div>
        </thead>
        <table class="table table-striped">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Tipo</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movements as $movement)
                    <tr>
                        {{-- <td>{{$movement->id}}</td> --}}
                        <td>
                            @switch($movement->type)
                                @case(1)
                                    <span class="font-weight-bold text-success">
                                        Ingreso
                                    </span>
                                @break

                                @case(2)
                                    <span class="font-weight-bold text-danger">
                                        Egreso
                                    </span>
                                @break

                                @default
                            @endswitch
                        </td>
                        <td>
                            @switch($movement->type)
                                @case(1)
                                    <span class="text-success">
                                        +${{ $movement->amount }}
                                    </span>
                                @break

                                @case(2)
                                    <span class="text-danger">
                                        -${{ $movement->amount }}
                                    </span>
                                @break

                                @default
                            @endswitch
                        </td>
                        <td>{{ $movement->created_at }}</td>
                        <td>{{ $movement->description }}</td>
                        <td width=10px>
                            @livewire('admin.cash.edit-movement', ['movement' => $movement], key('admin.cash.edit-movement-' . $movement->id))
                        </td>
                        <td width=10px>
                            <form action="{{ route('admin.cashes.destroy', $movement) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ningun movimiento registrado</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $movements->links() }}
    </div>
</div>
