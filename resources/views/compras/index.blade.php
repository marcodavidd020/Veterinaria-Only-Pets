@extends('home')
@section('title', 'Ingresos')

@section('petshop', 'active')

@section('css-derecha')
<link rel="stylesheet" href="{{ asset('css/table-information.css') }}">

<style>
    #comprasFormUpdate .form-control,
    #comprasFormUpdate .form-select,
    #comprasFormUpdate .select2-selection {
        background-color: khaki !important;
    }
</style>
@endsection

@section('contenido')

<div class="crud">


    <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
        @can('productos.create')
        <div class="registrar">
            <button href="#" class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#comprasFormInput" onclick="createSelector('Input')">
                Registrar <br> Compra
            </button>
        </div>
        @endcan
        <form action="{{ route('compras.index') }}" method="GET">
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
                    <th>Proveedor</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($compras as $compra)
                <tr>
                    <td>{{ $compra->id }}</td>
                    <td>{{ $compra->proveedor->nombre}}</td>
                    <td>{{ $compra->producto->nombre }}</td>
                    <td>{{ $compra->cantidad}}</td>
                    <td>{{ $compra->monto_total}}</td>
                    <td>
                        <a href="{{ route('compras.show', $compra->id) }}" class="button-edit" id="ver">
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
        {{ $compras->appends('busqueda=>$busqueda') }}
    </div>
</div>
@endsection

@section('body-final')
@can('productos.create')
<x-forms.compras-input id="comprasFormInput" />
@endcan
@endsection

@section('js-home')


@endsection