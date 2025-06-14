@extends('home')
@section('title', 'Cirugias')

@section('historial-clinico', 'active')

@section('css-derecha')
<link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
<style>
    #CirugiaFormUpdate .form-control,
    #CirugiaFormUpdate .form-select,
    #CirugiaFormUpdate .select2-selection {
        background-color: khaki !important;
    }
</style>
@endsection

@section('contenido')

@can('cirugias.create')
<div class="registrar">
    <button class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#CirugiaFormInput" onclick="createSelector('cirugia','input')">
        Registrar <br>Cirugia
    </button>
</div>
@endcan

<table class="tabla">
    <thead class="thead">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @foreach ($cirugias as $cirugia)
        <tr>
            <td>{{ $cirugia->id }}</td>
            <td>{{ $cirugia->nombre }}</td>
            <td>{{ $cirugia->tipo }}</td>
            <td>
                @can('cirugias.edit')
                <button class="button-edit">
                    <span class="material-icons-sharp" onclick=@php echo "\" imprimir(" . json_encode($cirugia->id) . ")\""; @endphp data-bs-toggle="modal"
                        data-bs-target="#CirugiaFormUpdate">
                        edit
                    </span>
                </button>
                @endcan
            </td>
            <td>
                @can('cirugias.edit')
                <form action="{{route('cirugias.destroy',$cirugia->id)}}" method="POST">
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
@can('cirugias.create')
<x-forms.input-datos-historial id="CirugiaFormInput" type="cirugia" />
@endcan
@can('cirugias.edit')
<x-forms.update-datos-historial id="CirugiaFormUpdate" type="cirugia" />
@endcan
@endsection

@section('js-home')

<script>
    //EVENTO ONCLICK PARA EL BOTON DE EDITAR
    function imprimir(id) {
        var cirugia = new XMLHttpRequest()
        cirugia.open("GET", "/cirugias/datas/" + id.toString(), true)
        cirugia.addEventListener("load", cargarDatos)
        cirugia.send()
    }

    function cargarDatos(e) {
        const datos = JSON.parse(this.responseText)
        // console.log(datos)
        $("#CirugiaFormUpdate #nombre").attr("value", datos.nombre)
        $("#CirugiaFormUpdate #tipo").attr("value", datos.tipo)

        let action = "/cirugias/" + datos.id

        $('#CirugiaFormUpdate form').attr('action', action)
    }
</script>
@endsection