@extends('home')
@section('title', 'Proveedores')

@section('petshop', 'active')

@section('css-derecha')
<link rel="stylesheet" href="{{ asset('css/table-information.css') }}">

<style>
    #proveedoresFormUpdate .form-control,
    #proveedoresFormUpdate .form-select,
    #proveedoresFormUpdate .select2-selection {
        background-color: khaki !important;
    }
</style>
@endsection

@section('contenido')

<div class="crud">


    <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
        @can('proveedores.create')
        <div class="registrar">
            <button href="#" class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#proveedoresFormInput" onclick="createSelector('Input')">
                Registrar Proveedor
            </button>
        </div>
        @endcan
        <form action="{{ route('proveedores.index') }}" method="GET">
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
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>NIT</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->email}}</td>
                    <td>{{ $proveedor->NIT}}</td>
                    <td>
                        <div class="d-flex flex-row justify-content-between">
                            @can('proveedores.edit')
                            <button class="button-edit" onclick=@php echo "\" desplegarForm(" . json_encode($proveedor->id) . ")\""; @endphp data-bs-toggle="modal"
                                data-bs-target="#proveedoresFormUpdate">
                                <span class="material-icons-sharp">
                                    edit
                                </span>
                            </button>
                            @endcan
                        </div>
                    </td>
                    <td>
                        <a href="{{route('proveedores.show', $proveedor)}}" class="button-edit" id="ver">
                            <span class="material-icons-sharp">
                                visibility
                            </span>
                        </a>
                    </td>
                    <td>
                        @can('proveedores.edit')
                        <form action="{{route('proveedores.destroy',$proveedor->id)}}" method="POST">
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
        {{ $proveedores->appends('busqueda=>$busqueda') }}
    </div>
</div>
@endsection

@section('body-final')
@can('proveedores.create')
<x-forms.proveedores-input id="proveedoresFormInput" />
@endcan
@can('proveedores.edit')
<x-forms.proveedores-update id="proveedoresFormUpdate" />
@endcan
@endsection

@section('js-home')
<script>
    const createSelector = (type) => {

        $('#formProveedores' + type + ' #proveedores').select2({
            theme: 'bootstrap-5',
            placeholder: 'Seleccione los proveedores',
            maximumSelectionLength: 5,
            width: '100%'
        })
    }

    function desplegarForm(id) {
        var admin = new XMLHttpRequest()
        admin.open("GET", "/proveedores/datas/" + id.toString(), true)
        admin.addEventListener("load", cargarDatos)
        admin.send()
    }

    function cargarDatos(e) {
        const datos = JSON.parse(this.responseText)
        $("#proveedoresFormUpdate #nombre").attr("value", datos.nombre)
        $("#proveedoresFormUpdate #direccion").attr("value", datos.direccion)
        $("#proveedoresFormUpdate #telefono").attr("value", datos.telefono)
        $("#proveedoresFormUpdate #email").attr("value", datos.email)
        $("#proveedoresFormUpdate #NIT").attr("value", datos.NIT)
        $("#proveedoresFormUpdate #id").attr("value", datos.id)

        createSelector('Update')

        let action = "/proveedores/" + datos.id

        $('#proveedoresFormUpdate form').attr('action', action)

    }
</script>

@endsection