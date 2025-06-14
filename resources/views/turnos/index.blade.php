@extends('home')
@section('title', 'Turnos')

@section('servicio', 'active')

@section('css-derecha')
<link rel="stylesheet" href="{{ asset('css/table-information.css') }}">

<style>
    #turnosFormUpdate .form-control,
    #turnosFormUpdate .form-select,
    #turnosFormUpdate .select2-selection {
        background-color: khaki !important;
    }
</style>
@endsection

@section('contenido')

<div class="crud">


    <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
        @can('turnos.create')
        <div class="registrar">
            <button href="#" class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#turnosFormInput" onclick="createSelector('Input')">
                Registrar <br>Turnos
            </button>
        </div>
        @endcan
        <form action="{{ route('turnos.index') }}" method="GET">
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
                    <th>Horario de entrada</th>
                    <th>Horario de salida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($turnos as $turno)
                <tr>
                    <td>{{ $turno->id }}</td>
                    <td>{{ $turno->horario_entrada }}</td>
                    <td>{{ $turno->horario_salida }}</td>
                    <td>
                        <div class="d-flex flex-row justify-content-between">
                            @can('turnos.edit')
                            <button class="button-edit" onclick=@php echo "\" desplegarForm(" . json_encode($turno->id) . ")\""; @endphp data-bs-toggle="modal"
                                data-bs-target="#turnosFormUpdate">
                                <span class="material-icons-sharp">
                                    edit
                                </span>
                            </button>
                            @endcan
                        </div>
                    </td>
                    <td>
                        @can('turnos.edit')
                        <form action="{{route('turnos.destroy',$turno->id)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button class="button-edit">
                                <span class="material-icons-sharp" type="submit" onclick="return confirm('¿Quieres borrar?')" class="button-edit">
                                    delete
                                </span>
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination" style="margin-top: 1rem;">
        {{ $turnos->appends('busqueda=>$busqueda') }}
    </div>
</div>
@endsection

@section('body-final')
@can('turnos.create')
<x-forms.turnos-input id="turnosFormInput" />
@endcan
@can('turnos.edit')
<x-forms.turnos-update id="turnosFormUpdate" />
@endcan
@endsection

@section('js-home')
<script>
    const createSelector = (type) => {

        $('#formTurnos' + type + ' #turnos').select2({
            theme: 'bootstrap-5',
            // tags: true,
            // dropdownParent: $('#mascotasFormInput'),
            placeholder: 'Seleccione los turnos',
            maximumSelectionLength: 5,
            width: '100%'
        })
    }

    function desplegarForm(id) {
        var admin = new XMLHttpRequest()
        admin.open("GET", "/turnos/datas/" + id.toString(), true)
        admin.addEventListener("load", cargarDatos)
        admin.send()
    }

    function cargarDatos(e) {
        const datos = JSON.parse(this.responseText)
        $("#turnosFormUpdate #horario_entrada").attr("value", datos.horario_entrada)
        $("#turnosFormUpdate #horario_salida").attr("value", datos.horario_salida)

        createSelector('Update')

        let action = "/turnos/" + datos.id

        $('#turnosFormUpdate form').attr('action', action)

    }
</script>

@endsection