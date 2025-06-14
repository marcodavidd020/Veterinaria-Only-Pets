@extends('home')
@section('title', 'Productos')

@section('petshop', 'active')

@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">

    <style>
        #productosFormUpdate .form-control,
        #productosFormUpdate .form-select,
        #productosFormUpdate .select2-selection {
            background-color: khaki !important;
        }
    </style>
@endsection

@section('contenido')

    <div class="crud">


        <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
            @can('productos.create')
                <div class="registrar">
                    <button href="#" class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#productosFormInput"
                        onclick="createSelector('Input')">
                        Registrar <br> Producto
                    </button>
                </div>
            @endcan
            <form action="{{ route('productos.index') }}" method="GET">
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
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio}}</td>
                            <td>{{ $producto->cantidad}}</td>
                            <td>
                              <div class="d-flex flex-row justify-content-between">
                                @can('productos.edit')
                                <button class="button-edit" onclick=@php  echo "\"desplegarForm(" . json_encode($producto->id) . ")\""; @endphp data-bs-toggle="modal"
                                    data-bs-target="#productosFormUpdate">
                                    <span class="material-icons-sharp">
                                        edit
                                    </span>
                                </button>
                                @endcan
                                <a href="{{ route('productos.show', $producto)}}" class="button-edit" id="ver">
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
            {{ $productos->appends('busqueda=>$busqueda') }}
        </div>
    </div>
@endsection

@section('body-final')
    @can('productos.create')
    <x-forms.productos-input id="productosFormInput" />
    @endcan
    @can('productos.create')
    <x-forms.compras-input id="comprasFormInput" />
    @endcan
    @can('productos.create')
    <x-forms.ventas-input id="ventasFormInput" />
    @endcan
    @can('productos.edit')
    <x-forms.productos-update id="productosFormUpdate" />
    @endcan
@endsection

@section('js-home')
    <script>
        const createSelector = (type) => {

            $('#formProductos' + type + ' #categoria').select2({
                theme: 'bootstrap-5',
                placeholder: 'Seleccione la categoria',
                maximumSelectionLength: 100,
                width: '100%'
            })
        }

        function desplegarForm(id) {
            var admin = new XMLHttpRequest()
            admin.open("GET", "/productos/datas/" + id.toString(), true)
            admin.addEventListener("load", cargarDatos)
            admin.send()
        }

        function cargarDatos(e) {
            const datos = JSON.parse(this.responseText)
            $("#productosFormUpdate #nombre").attr("value", datos.nombre)
            $("#productosFormUpdate #descripcion").attr("value", datos.descripcion)
            $("#productosFormUpdate #costo").attr("value", datos.costo)
            $("#productosFormUpdate #precio").attr("value", datos.precio)
            $("#productosFormUpdate #marca").attr("value", datos.marca)
            $("#productosFormUpdate #foto").attr("value", datos.foto)
            
            $("#productosFormUpdate #id_categoria option")[0].selected="true"
            if (datos.id_categoria) {
                const id_cat = datos.id_categoria
                const categoriaSelected = "#productosFormUpdate #id_categoria " + "option[value=" + String(id_cat) + "]"
                $("#productosFormUpdate #id_categoria option").each((i,e)=>{
                    $(e).attr("selected", false)
                   // console.log(e)
                })
                $(categoriaSelected).attr("selected", true)
            }

            createSelector('Update')

            let action = "/productos/" + datos.id

            $('#productosFormUpdate form').attr('action', action)

        }
    </script>

@endsection
