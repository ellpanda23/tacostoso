@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <h1>Lista de comandas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success" category="alert">
            <strong>Listo</strong> {{session('info')}}
        </div>
    @endif

    @livewire('admin.command.show-commands')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('js/admin/alerts.js')}}"></script>
@stop
