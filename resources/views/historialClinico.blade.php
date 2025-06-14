@extends('home')

@section('historial-clinico', 'active')
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
    @can('cirugias.index')
    <div class="col">
        <div class="card">
            <img src="{{ asset('images/historial-clinico/cirugia.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4 ">Cirugias</h5>
                <div class="align-items-center">
                    <a href="{{ route('cirugias.index') }}">
                        <button type="button" class="btn btn-primary mb-3">Ver lista</button>
                    </a>
                    @can('cirugias.create')
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CirugiaFormInput" onclick="createSelector('cirugia','input')">
                        Crear Cirugia
                    </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    @endcan

    @can('enfermedades.index')
    <div class="col">
        <div class="card">
            <img src="{{ asset('images/historial-clinico/enfermedad.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Enfermedades</h5>
                <a href="{{ route('enfermedades.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista
                    </button>
                </a>
                @can('enfermedades.create')
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EnfermedadFormInput" onclick="createSelector('enfermedad','input')">
                    Crear Enfermedad
                </button>
                @endcan
            </div>
        </div>
    </div>
    @endcan


    @can('vacunas.index')
    <div class="col">
        <div class="card">
            <img src="{{ asset('images/historial-clinico/vacuna.jpg') }}" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Vacunas</h5>
                <a href="{{ route('vacunas.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista
                    </button>
                </a>
                @can('vacunas.create')
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#input-vacuna">Crear Vacuna</button>
                @endcan
            </div>
        </div>
    </div>
    @endcan

    @can('historiales.index')
    <div class="col">
        <div class="card">
            <img src="{{ asset('images/historial-clinico/historialclinico.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Historial Clinico</h5>
                <a href="{{ route('historiales.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista</button>
                </a>
            </div>
        </div>
    </div>
    @endcan
</div>




@endsection
@section('body-final')
<x-forms.input-vacunas />
<x-forms.input-datos-historial id="CirugiaFormInput" type="cirugia" />
<x-forms.input-datos-historial id="EnfermedadFormInput" type="enfermedad" />
@endsection

@section('js-home')
@endsection