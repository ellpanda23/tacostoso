<div>
    <div class="card">

        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escribe un nombre">
        </div>
        @if($users->count())

            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th width="10px"><span class="sr-only">Editar</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="card-footer">
                    {{$users->links()}}
                </div>
            </div>

        @else

            <div class="text-4xl text-center card-body">
                <strong>No hay registros...</strong>
            </div>

        @endif
    </div>


</div>
