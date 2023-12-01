@extends('adminlte::page')

@section('title', 'Home English')

@section('content_header')
    <h1>Crear nueva mesa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tables.store']) !!}

                @include('admin.tables.partials.form')

                {!! Form::submit('Crear mesa', ['class' => 'btn btn-primary mt-2']) !!}

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
