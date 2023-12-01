@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <h1>Lista de categorias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success" category="alert">
            <strong>Listo</strong> {{session('info')}}
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <a href="{{route('admin.categories.create')}}">Crear categoria</a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Productos</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->products->count()}}</td>
                            <td width=10px>
                                <a class="btn btn-secondary" href="{{route('admin.categories.edit', $category)}}">Editar</a>
                            </td>
                            <td width=10px>
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('js/admin/alerts.js')}}"></script>
@stop
