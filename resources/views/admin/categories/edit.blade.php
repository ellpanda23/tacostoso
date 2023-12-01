@extends('adminlte::page')

@section('title', 'Home English')

@section('content_header')
    <h1>Editar categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'PUT']) !!}

                @include('admin.categories.partials.form')

                {!! Form::submit('Actualizar categoria', ['class' => 'btn btn-primary mt-2']) !!}

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
