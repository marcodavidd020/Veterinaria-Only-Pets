@extends('home')

@section('petshop', 'active')
@section('css-derecha')
<style>
    .col .card {
        height: 100%;
        background: var(--color-background-panel);
    }

    .card>img {
        height: 60%;
    }

    .card .card-body {
        height: 40%;
    }

    .card button {
        width: 100%;
    }
</style>
@endsection
@section('contenido')

<div class="row d-flex align-items-stretch pt-5  ">
    <div class="col">
        @can('proveedores.index')
        <div class="card">
            <img src="{{ asset('images/petshop/proveedores.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4 ">Proveedores</h5>
                <a href="{{ route('proveedores.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista</button>
                </a>
                @can('proveedores.create')
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#proveedoresFormInput" onclick="createSelector('Input')">
                    Registrar Proveedor
                </button>
                @endcan
            </div>
        </div>
        @endcan
    </div>

    <div class="col">
        @can('productos.index')
        <div class="card">
            <img src="{{ asset('images/petshop/productos.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Producto</h5>
                <a href="{{ route('productos.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista
                    </button>
                </a>
                @can('productos.create')
                <div class="registrar">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#productosFormInput" onclick="createSelector('Input')">
                        Registrar Producto
                    </button>
                </div>
                @endcan
            </div>
        </div>
        @endcan
    </div>


    <div class="col">
        <div class="card">
            <img src="{{ asset('images/petshop/categorias.jpg') }}" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Categorias</h5>
                <a href="{{ route('categorias.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista
                    </button>
                </a>
                @can('proveedores.create')
                <div class="registrar">
                    <button type="button" class="btn btn-success" class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#categoriaFormInput" onclick="createSelector('Input')">
                        Registrar categoria
                    </button>
                </div>
                @endcan
            </div>
        </div>

    </div>

    <div class="col">
        <div class="card">
            <img src="{{ asset('images/petshop/compras.jpg') }}" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Compras</h5>
                <a href="{{ route('compras.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista
                    </button>
                </a>
                @can('productos.create')
                <div class="registrar">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#comprasFormInput" onclick="createSelector('Input')">
                        Registrar Compra
                    </button>
                </div>
                @endcan
            </div>
        </div>

    </div>

    <div class="col">
        <div class="card">
            <img src="{{ asset('images/petshop/ventas.jpg') }}" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Ventas</h5>
                <a href="{{ route('ventas.index') }}">
                    <button type="button" class="btn btn-primary mb-3">Ver lista
                    </button>
                </a>
                @can('productos.create')
                <div class="registrar">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ventasFormInput" onclick="createSelector('Input')">
                        Registrar Venta
                    </button>
                </div>
                @endcan
            </div>
        </div>

    </div>

</div>




@endsection
@section('body-final')
@can('proveedores.create')
<x-forms.proveedores-input id="proveedoresFormInput" />
@endcan
@can('productos.create')
<x-forms.compras-input id="comprasFormInput" />
@endcan
@can('productos.create')
<x-forms.ventas-input id="ventasFormInput" />
@endcan
@can('productos.create')
<x-forms.productos-input id="productosFormInput" />
@endcan
@can('categorias.create')
<x-forms.categoria-input id="categoriaFormInput" />
@endcan
@endsection

@section('js-home')
@endsection