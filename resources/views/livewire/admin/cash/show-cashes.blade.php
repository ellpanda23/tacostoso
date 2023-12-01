<div>

    <h5>Caja activa</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Responsable</th>
                <th>Cantidad inicial</th>
                <th>Hora de apertura</th>
                <th>Monto Actual</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @empty($activeCash)
                <tr>
                    <td colspan="4">No hay ninguna caja abierta</td>
                </tr>
            @else
                <tr>
                    <td>{{ $activeCash->user->name }}</td>
                    <td>{{ $activeCash->initial_balance }}</td>
                    <td>{{ $activeCash->created_at }}</td>
                    <td>{{ $activeCash->movements->sum('amount') }}</td>
                    <td width=10px>
                        <a class="btn btn-secondary" href="{{ route('admin.cashes.edit', $activeCash) }}">Editar</a>
                    </td>
                    <td width=10px>
                        <form action="{{route('admin.cashes.destroy', $activeCash)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endempty
        </tbody>
    </table>

    <h5>Cajas cerradas</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Responsable</th>
                <th>Cantidad inicial</th>
                <th>Hora de apertura</th>
                <th>Monto Actual</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cashes as $cash)
                <tr>
                    <td>{{$cash->user->name}}</td>
                    <td>{{$cash->initial_balance}}</td>
                    <td>{{$cash->created_at}}</td>
                    <td>{{$cash->movements->sum('amount')}}</td>
                    <td width=10px>
                        <a class="btn btn-secondary" href="{{route('admin.cashes.edit', $cash)}}">Editar</a>
                    </td>
                    <td width=10px>
                        <form action="{{route('admin.cashes.destroy', $cash)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay ninguna caja cerrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
