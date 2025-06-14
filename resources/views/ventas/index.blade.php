@extends('home')
@section('title', 'Ingresos')

@section('petshop', 'active')

@section('css-derecha')
<link rel="stylesheet" href="{{ asset('css/table-information.css') }}">

<style>
    #ventasFormUpdate .form-control,
    #ventasFormUpdate .form-select,
    #ventasFormUpdate .select2-selection {
        background-color: khaki !important;
    }
</style>
@endsection

@section('contenido')

<div class="crud">


    <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
        @can('productos.create')
        <div class="registrar">
            <button href="#" class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#ventasFormInput" onclick="createSelector('Input')">
                Registrar <br> Venta
            </button>
        </div>
        @endcan
        <form action="{{ route('ventas.index') }}" method="GET">
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
                    <th>Producto</th>
                    <th>Precio Total</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->producto->nombre}}</td>
                    <td>{{ $venta->precio_total }}</td>
                    <td>{{ $venta->cantidad}}</td>

                    <td>

                        <a href="{{route('ventas.pdf',$venta)}}" class="button-edit">
                            <span class="material-icons-sharp">
                                file_download
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination" style="margin-top: 1rem;">
        {{ $ventas->appends('busqueda=>$busqueda') }}
    </div>
</div>
@endsection

@section('body-final')
@can('productos.create')
<x-forms.ventas-input id="ventasFormInput" />
@endcan
@endsection

@section('js-home')


@endsection