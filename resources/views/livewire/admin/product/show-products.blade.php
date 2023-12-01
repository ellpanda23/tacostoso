<div>

    @if (session('info'))
        <div class="alert alert-success" product="alert">
            <strong>Listo</strong> {{session('info')}}
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <a href="{{route('admin.products.create')}}">Crear producto</a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            {{-- <td>{{$product->id}}</td> --}}
                            <td>{{$product->name}}</td>
                            <td>
                                <span class="text-success">${{$product->cost}} </span>
                                <span>{{$product->countable == 1 ? $product->metric : ''}}</span>
                            </td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->stock}}</td>
                            <td>
                                @switch($product->status)
                                    @case(1)
                                        <span class="text-success font-weight-bold">Disponible</span>
                                        @break
                                    @case(2)
                                        <span class="text-danger font-weight-bold">No disponible</span>
                                        @break
                                    @default

                                @endswitch
                            </td>
                            <td width=10px>
                                <a class="btn btn-secondary" href="{{route('admin.products.edit', $product)}}">Editar</a>
                            </td>
                            <td width=10px>
                                <form action="{{route('admin.products.destroy', $product)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ningun rol registrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$products->links()}}
        </div>

    </div>
</div>
