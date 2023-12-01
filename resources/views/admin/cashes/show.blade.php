@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <h1>Caja Activa</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success" cash="alert">
            <strong>Listo</strong> {{ session('info') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body table-responsive">

            @livewire('admin.cash.show-cashes')

        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

    <script src="{{asset('js/admin/alerts.js')}}"></script>

@stop
