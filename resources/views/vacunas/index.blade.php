@extends('home')
@section('title', 'Vacunas')

@section('historial-clinico', 'active')

@section('css-derecha')
<link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
<style>
    #VacunaFormUpdate .form-control,
    #VacunaFormUpdate .form-select,
    #VacunaFormUpdate .select2-selection {
        background-color: khaki !important;
    }
</style>
@endsection

@section('contenido')

@can('vacunas.create')
<div class="registrar">
    <button class="buttonRegistrame" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#input-vacuna">
        Registrar <br>Vacuna
    </button>
</div>
@endcan

<table class="tabla">
    <thead class="thead">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @foreach ($vacunas as $vacuna)
        <tr>
            <td>{{ $vacuna->id }}</td>
            <td>{{ $vacuna->nombre }}</td>
            <td>
                @can('vacunas.edit')
                <form action="{{route('vacunas.destroy',$vacuna->id)}}" method="POST">
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


@endsection

@section('body-final')
@can('vacunas.create')
<x-forms.input-vacunas />
@endcan
@endsection


@section('js-home')

<script>
    //EVENTO ONCLICK PARA EL BOTON DE EDITAR
    function imprimir(id) {
        var vacuna = new XMLHttpRequest()
        vacuna.open("GET", "/vacunas/datas/" + id.toString(), true)
        vacuna.addEventListener("load", cargarDatos)
        vacuna.send()
    }

    function cargarDatos(e) {
        const datos = JSON.parse(this.responseText)
        // console.log(datos)
        $("#VacunaFormUpdate #nombre").attr("value", datos.nombre)
        $("#VacunaFormUpdate #tipo").attr("value", datos.tipo)

        let action = "/vacunas/" + datos.id

        $('#VacunaFormUpdate form').attr('action', action)
    }
</script>
@endsection