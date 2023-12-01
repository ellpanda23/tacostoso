<div>
    <div class="card">

        <div class="card-header">
            {{-- <a href="{{route('admin.commands.create')}}">Crear categoria</a> --}}
            <div class="input-group">
                {!! Form::text('search', $search, ['class' => 'form-control', 'aria-label' => 'Text input with dropdown button', 'wire:model' => 'search', 'placeholder' => 'Buscar por monto o descripción']) !!}
                <div class="input-group-append">
                    <a class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Tipo</a>
                    <div class="dropdown-menu">
                        <a class="pe-auto dropdown-item" wire:click="$set('status', 1)">Activo</a>
                        <a class="pe-auto dropdown-item" wire:click="$set('status', 2)">Pagado</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" wire:click="$set('status', '')">Todos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Responsable</th>
                        <th>Productos</th>
                        <th>Fecha</th>
                        <th>Costo</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($commands as $command)
                        <tr>
                            <td>{{$command->id}}</td>
                            <td>{{$command->user->name}}</td>
                            <td>{{$command->products->count()}}</td>
                            <td>{{$command->created_at}}</td>
                            <td class="font-weight-bold text-success">${{$command->total_cost}}</td>
                            <td>
                                @switch($command->status)
                                    @case(1)
                                        <span class="text-danger">ACTIVO</span>
                                    @break
                                    @case(2)
                                        <span class="text-success">PAGADO</span>
                                        @break
                                    @default

                                @endswitch
                            </td>
                            <td width=10px>
                                <a class="btn btn-secondary" href="{{route('admin.commands.edit', $command)}}">Editar</a>
                            </td>
                            <td width=10px>
                                <form action="{{route('admin.commands.destroy', $command)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" status="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay ninguna comanda registrada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$commands->links()}}
        </div>
    </div>
</div>
