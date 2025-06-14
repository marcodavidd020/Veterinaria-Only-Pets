@extends('home')
@section('title', 'categorias')
@section('petshop', 'active')
@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
    <style> 
        #categoriasFormUpdate .form-control,
        #categoriasFormUpdate .form-select,
        #categoriasFormUpdate .select2-selection {
            background-color: khaki !important;
        }
    </style>
@endsection

@section('contenido')

<div class="crud">
    <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
        @can('proveedores.create')
        <div class="registrar">
            <button href="#" class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#categoriaFormInput"
                onclick="createSelector('Input')">
                Registrar categoria
            </button>
        </div>
        @endcan
        <form action="{{ route('categorias.index') }}" method="GET">
            <div class="btn-group">
                <input type=" text" name="busqueda" class="form-control">
                <input type="submit" value="Buscar" class="btn btn-primary"
                    style="background-color: var(--color-danger);">
            </div>
        </form>
    </div>
    <div class="tabla-contenedor">
        <table class="tabla">
            <thead class="thead">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                    <div class="d-flex flex-row justify-content-between">
                        @can('categorias.edit')
                        <button class="button-edit" onclick=@php  echo "\"desplegarForm(" . json_encode($categoria->id) . ")\""; @endphp data-bs-toggle="modal"
                            data-bs-target="#categoriaFormUpdate">
                            <span class="material-icons-sharp">
                                edit
                            </span>
                        </button>
                        @endcan
                    </div>
                </td>
                @endforeach
            </tbody>
        </table>
    </div>
           <div class="pagination" style="margin-top: 1rem;">
               {{ $categorias->appends('busqueda=>$busqueda') }}
            </div>
</div>
@endsection

@section('body-final')
    @can('categorias.create')
    <x-forms.categoria-input id="categoriaFormInput" />
    @endcan
    @can('categorias.edit')
    <x-forms.categoria-update id="categoriaFormUpdate" />
    @endcan

    @section('js-home')
    <script>
        const createSelector = (type) => {

            $('#formcategorias' + type + ' #categorias').select2({
                theme: 'bootstrap-5',
                placeholder: 'Seleccione la categoria',
                maximumSelectionLength: 5,
                width: '100%'
            })
        }

        function desplegarForm(id) {
            var admin = new XMLHttpRequest()
            admin.open("GET", "/categorias/datas/" + id.toString(), true)
            admin.addEventListener("load", cargarDatos)
            admin.send()
        }

        function cargarDatos(e) {
            const datos = JSON.parse(this.responseText)
            $("#categoriaFormUpdate #nombre").attr("value", datos.nombre)

            createSelector('Update')

            let action = "/categorias/" + datos.id

            $('#categoriaFormUpdate form').attr('action', action)

        }
    </script>

@endsection