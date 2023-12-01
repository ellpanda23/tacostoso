@extends('adminlte::page')

@section('title', 'Home English')

@section('content_header')
    <h1>Agregar producto a inventario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.storage.store']) !!}

                @include('admin.storage.partials.form')

                {!! Form::submit('Agregar', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('js/admin/alerts.js')}}"></script>
@stop
