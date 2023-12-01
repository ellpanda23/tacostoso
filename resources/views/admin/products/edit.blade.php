@extends('adminlte::page')

@section('title', 'Home English')

@section('content_header')
    <h1>Editar producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($product, ['route' => ['admin.products.update', $product], 'method' => 'PUT']) !!}

                @include('admin.products.partials.form')

                {!! Form::submit('Actualizar producto', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/products/form.css') }}">
@stop

@section('js')
<script src="{{ asset('js/admin/alerts.js') }}"></script>
<script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('js/admin/products/form.js') }}"></script>
@stop
