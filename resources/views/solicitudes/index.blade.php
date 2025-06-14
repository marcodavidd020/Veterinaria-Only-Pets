@extends('home')
@section('title', 'Solicitudes')

@section('servicio', 'active')

@section('css-derecha')
<link rel="stylesheet" href="{{ asset('css/table-information.css') }}">

<style>
    #solicitudesFormUpdate .form-control,
    #solicitudesFormUpdate .form-select,
    #solicitudesFormUpdate .select2-selection {
        background-color: khaki !important;
    }
</style>
@endsection

@section('contenido')

<div class="crud">
    <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
        @can('cita-servicio.create')
        <div class="registrar">
            <button href="" class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#solicitudesFormInput" onclick="createSelector('Input')">
                Registrar <br>Solicitud De Servicio
            </button>
        </div>
        @endcan
        <form action="{{ route('solicitudes.index') }}" method="GET">
            <div class="btn-group">
                <input type=" text" name="busqueda" class="form-control">
                <input type="submit" value="Buscar" class="btn btn-primary" style="background-color: var(--color-danger);">
            </div>
        </form>
    </div>
    <div class="tabla-contenedor">
        <table class="tabla">
            <thead class="thead">
                <tr>
                    <th>Id</th>
                    <th>Nombre de cliente</th>
                    <th>Nombre de mascota</th>
                    <th>Nombre de servicio</th>
                    <th>Id de recibo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->id }}</td>
                    <td>{{ $solicitud->cliente->persona->nombre }}
                        {{ $solicitud->cliente->persona->apellido_paterno }}
                        {{ $solicitud->cliente->persona->apellido_materno }}
                    </td>
                    <td>{{ $solicitud->mascota->nombre }}</td>
                    <td>
                        @if ($solicitud->id_servicio)
                        {{ $solicitud->servicio->nombre }}
                        @else
                        ninguno
                        @endif
                    </td>
                    <td>{{ $solicitud->id_recibo }}</td>
                    <td>
                        <a href="{{ route('solicitudes.show', $solicitud) }}" class="button-edit" id="ver">
                            <span class="material-icons-sharp">
                                visibility
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination" style="margin-top: 1rem;">
        {{ $solicitudes->appends('busqueda=>$busqueda') }}
    </div>
</div>
@endsection
@section('body-final')
@can('cita-servicio.create')
<x-solicitudes-input id="solicitudesFormInput" />
@endcan
@endsection

@section('js-home')
<script>
    const createSelector = (type) => {

        $('#formSolicitudesInput' + ' #servicios').select2({
            theme: 'bootstrap-5',
            // tags: true,
            // dropdownParent: $('#mascotasFormInput'),
            placeholder: 'Seleccione los servicios',
            maximumSelectionLength: 5,
            width: '100%'
        })
    }

    function desplegarForm(id) {
        var admin = new XMLHttpRequest()
        admin.open("GET", "/solicitudes/datas/" + id.toString(), true)
        admin.addEventListener("load", cargarDatos)
        admin.send()
    }
</script>

@endsection