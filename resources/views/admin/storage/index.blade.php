@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <h1>Lista de productos en almacen</h1>
@stop

@section('content')

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
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            {{-- <td>{{$product->id}}</td> --}}
                            <td>{{$product->name}}</td>
                            <td>${{$product->cost}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>
                                @switch($product->status)
                                    @case(1)
                                        Disponible
                                        @break
                                    @case(2)
                                        No disponible
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
                            <td colspan="4">No hay ningun producto registrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script src="{{asset('js/admin/alerts.js')}}"></script>
@stop
