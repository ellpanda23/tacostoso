@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <h1>Lista de productos</h1>
@stop

@section('content')
    @livewire('admin.product.show-products')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('js/admin/alerts.js')}}"></script>
@stop
