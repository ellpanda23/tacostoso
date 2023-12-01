@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <h1>Flujo de caja</h1>
@stop

@section('content')


    @isset($cash)
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Estadisticas de caja</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>

        </div>

        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-dollar-sign"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Dinero en caja</span>
                            <span class="info-box-number text-success">${{$cash->actual_amount}}</span>
                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Ingresos</span>
                            <span class="info-box-number text-success">${{$cash->total_ingress}}</span>
                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Egresos</span>
                            <span class="info-box-number text-danger">${{$cash->total_egress}}</span>
                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-star"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Transacciones</span>
                            <span class="info-box-number">{{$cash->movements->count()}}</span>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

    @livewire('admin.cash.cash-flow')


    @else

    <div class="card">

        <div class="card-body">
            <span>No hay ninguna caja abierta</span>
            <a href="{{ route('admin.cashes.create') }}" class="float-right btn btn-primary">Abrir caja</a>
        </div>

    </div>

    @endisset




@stop

@section('css')

@stop

@section('js')

    <script src="{{ asset('js/admin/alerts.js') }}"></script>

@stop
