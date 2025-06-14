@extends('home')
@section('title', 'Ingresos')

@section('petshop','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>Nota de ingreso</h1>
            <strong>Proveedor :</strong>{{ $compras->proveedor->nombre }}<br>
            <strong>Producto :</strong>: {{$compras->producto->nombre}}<br>
            <strong>Administrativo :</strong>: {{$compras->administrativo->persona->nombre}}<br>
            <strong>Cantidad :</strong>: {{$compras->cantidad}}<br>
            <strong>Fecha :</strong>: {{$compras->fecha}}<br>
            <strong>Hora :</strong>: {{$compras->hora}}<br>
            <strong>Monto Total :</strong>: {{$compras->monto_total}}<br>
            <div class="col" style="margin-top: 2.5%;">
                <a href="{{route('compras.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>

@endsection