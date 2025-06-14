@extends('home')

@section('registrar-datos', 'active')
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


    <div class="row d-flex align-items-stretch justify-content-around pt-5  ">
        @can('administrativos.index')
        <div class="col-3">
            <div class="card" style="height:100%;">
                <img src="{{ asset('images/datos/administrativos.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-4 ">Administrativos</h5>
                    <a href="{{ route('administrativos.index') }}">
                        <button type="button" class="btn btn-primary mb-3">Ver lista</button>
                    </a>
                    @can('administrativos.create')
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#AdministrativoFormInput"
                        onclick = "createSelector('administrativo')">Crear Administrativo</button>
                    @endcan    
                </div>
            </div>
        </div>
        @endcan

        @can('mascotas.index')
        <div class="col-sm-6 col-lg-3 ">
            <div class="card" style="height:100%;">
                <img src="{{ asset('images/datos/mascotas.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-4">Mascotas</h5>
                    <a href="{{ route('mascotas.index') }}">
                        <button type="button" class="btn btn-primary mb-3" >Ver lista
                        </button>
                    </a>
                    @can('mascotas.create')
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#mascotasFormInput">Crear Mascotas</button>
                    @endcan
                </div>
            </div>
        </div>
        @endcan

        @can('clientes.index')
        <div class="col-sm-6 col-lg-3 ">
            <div class="card" style="height:100%;">
                <img src="{{ asset('images/datos/clientes.jpg') }}" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-4">Clientes</h5>
                    <a href="{{ route('clientes.index') }}">
                        <button type="button" class="btn btn-primary mb-3">Ver lista
                        </button>
                    </a>
                    @can('clientes.create')
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#ClienteFormInput" onclick="createSelector('cliente')">Crear Cliente</button>
                    @endcan
                </div>
            </div>

        </div>
        @endcan

        @can('veterinarios.index')
        <div class="col-3">
            <div class="card" style="height:100%;">
                <img src="{{ asset('images/datos/veterinarios.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-4">Veterinarios</h5>
                    <a href="{{ route('veterinarios.index') }}">
                        <button type="button" class="btn btn-primary mb-3">Ver lista</button>
                    </a>
                    @can('veterinarios.create')
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#VeterinarioFormInput" onclick="createSelector('veterinario')">Crear Veterinario</button>
                    @endcan
                    </div>
        </div>
        </div>
        @endcan

    </div>
   



@endsection
@section('body-final')
    <x-input-datos id="VeterinarioFormInput" type="veterinario" />
    <x-input-datos id="AdministrativoFormInput" type="administrativo" />
    <x-input-datos id="ClienteFormInput" type="cliente" />
    <x-mascotas-input id="mascotasFormInput"/>
@endsection

@section('js-home')
    <script>
        const createSelector = (type) =>{
            let selector = '.input-datos-telefono-'+type;
            $(selector).select2({
              //  theme: 'bootstrap-5',
                tags: true,
                placeholder: 'Inserte los telefonos',
            //    dropdownParent: $('#'+type+'FormInput'),
                maximumSelectionLength: 3,
                 maximumInputLength: 9,
                 minimumInputLength: 8,
                tokenSeparators: [',', ' '],
                width: '100%'
            })
        }

        $(document).ready(function () {
            $("#formMascotasInput #duenhos").select2({
                theme: 'bootstrap-5',
               // tags: true,
               // dropdownParent: $('#mascotasFormInput'),
                placeholder: 'Seleccione los dueños',
                maximumSelectionLength: 5,
                width: '100%'
            })
        });
      
    </script>
@endsection
