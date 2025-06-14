@extends('home')

@section('servicio', 'active')
@section('css-derecha')
<style>
    .col .card {
        height: 100%;
        background: var(--color-background-panel);
    }

    .card>img {
        height: 60%;
    }

    .card .card-body {
        height: 40%;
    }

    .card button {
        width: 100%;
    }
</style>
@endsection
@section('contenido')

<div class="row d-flex align-items-stretch pt-5  ">
    <div class="col">
        <div class="card">
            <img src="{{ asset('images/servicios/servicios.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4 ">Servicios</h5>
                <a href="{{ route('servicios.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista</button>
                </a>
                @can('servicios.index')
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ServicioFormInput" onclick="createSelector('servicio','input')">
                    Registrar Servicio
                </button>
                @endcan
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img src="{{ asset('images/servicios/solicitudes.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Solicitud De Servicio</h5>
                <a href="{{ route('solicitudes.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista
                    </button>
                </a>
            </div>
        </div>
    </div>


    <div class="col">
        <div class="card">
            <img src="{{ asset('images/servicios/turnos.jpg') }}" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Turnos</h5>
                <a href="{{ route('turnos.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista
                    </button>
                </a>
                @can('turnos.create')
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#turnosFormInput" onclick="createSelector('Input')">
                    Registrar Turnos
                </button>
                @endcan
            </div>
        </div>

    </div>
</div>




@endsection
@section('body-final')
@can('servicios.create')
<x-forms.input-datos-servicios id="ServicioFormInput" type="servicio" />
@endcan
@can('turnos.create')
<x-forms.turnos-input id="turnosFormInput" />
@endcan
@endsection

@section('js-home')
@endsection