@extends('home')
@section('title', 'Servicios')
@section('servicio', 'active')
@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
    <style>
        #ServicioFormUpdate .form-control,
        #ServicioFormUpdate .form-select,
        #ServicioFormUpdate .select2-selection {
            background-color: khaki !important;
        }
    </style>
@endsection
@section('contenido')


    <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
        @can('servicios.index')
        <div class="registrar">
            <button class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#ServicioFormInput"
                onclick="createSelector('servicio','input')">
                Registrar <br>Servicio
            </button>
        </div>
        @endcan
        <form action="{{ route('servicios.index') }}" method="GET">
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
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->id }}</td>
                        <td>{{ $servicio->nombre }}</td>
                        <td>{{ $servicio->precio }}</td>
                        <td>
                          <div class="d-flex flex-row justify-content-between">
                            @can('servicios.edit')
                          <button class="button-edit">
                                <span class="material-icons-sharp" onclick=@php echo "\" imprimir(" . json_encode($servicio->id) . ")\""; @endphp data-bs-toggle="modal"
                                    data-bs-target="#ServicioFormUpdate">
                                    edit
                                </span>
                            </button>
                            @endcan
                            <a href="{{ route('servicios.show', $servicio) }}" class="button-edit" id="ver">
                                <span class="material-icons-sharp">
                                    visibility
                                </span>
                            </a>
                          </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination" style="margin-top: 1rem;">
        {{ $servicios->appends('busqueda=>$busqueda') }}
    </div>


@endsection

@section('body-final')
    @can('servicios.create')
    <x-forms.input-datos-servicios id="ServicioFormInput" type="servicio" />
    @endcan
    @can('servicios.edit')
    <x-forms.update-datos-servicios id="ServicioFormUpdate" type="servicio" />
    @endcan
@endsection
@section('js-home')

    <script>
        //EVENTO ONCLICK PARA EL BOTON DE EDITAR
        function imprimir(id) {
            var admin = new XMLHttpRequest()
            admin.open("GET", "/servicios/datas/" + id.toString(), true)
            admin.addEventListener("load", cargarDatos)
            admin.send()
        }

        function cargarDatos(e) {
            const datos = JSON.parse(this.responseText)
            console.log(datos)
            $("#ServicioFormUpdate #nombre").attr("value", datos.nombre)
            $("#ServicioFormUpdate #descripcion").attr("value", datos.descripcion)
            $("#ServicioFormUpdate #precio").attr("value", datos.precio)

            let action = "/servicios/" + datos.id

            $('#ServicioFormUpdate form').attr('action', action)
        }
    </script>
@endsection
