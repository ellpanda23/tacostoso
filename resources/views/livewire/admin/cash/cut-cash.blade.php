<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Responsable</th>
                <th>Cantidad inicial</th>
                <th>Hora de apertura</th>
                <th>Corte Parcial</th>
                <th>Hora corte parcial</th>
                <th>Monto Actual</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @empty($cash)
                <tr>
                    <td colspan="9" class="text-center">No hay ninguna caja abierta</td>
                </tr>
            @else
                <tr>
                    <td>{{ $cash->id }}</td>
                    <td>{{ $cash->user->name }}</td>
                    <td>${{ $cash->initial_balance }}</td>
                    <td>{{ $cash->created_at }}</td>
                    <td>{{ $cash->partial_cut }}</td>
                    <td>{{ $cash->updated_at }}</td>
                    <td class="text-success font-weight-bolder">${{ $cash->actual_amount }}</td>
                    <td width=10px>
                        @livewire('admin.cash.partial-cut', ['cash' => $cash], key('admin.cash.partial-cut-' . $cash->id))
                    </td>
                    <td width=10px>
                        @livewire('admin.cash.close-cash', ['cash' => $cash], key('admin.cash.close-cash-' . $cash->id))
                    </td>
                </tr>
            @endempty
        </tbody>
    </table>

</div>
