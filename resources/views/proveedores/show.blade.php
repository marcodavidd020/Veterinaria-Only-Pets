@extends('home')
@section('title', 'Proveedor')

@section('petshop','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>{{$proveedore->nombre}}</h1>
            <h3>{{$proveedore->email}}</h3>
            <p>
                <strong>NIT</strong>: {{$proveedore->NIT}} <br>
                <strong>Telefono</strong>: {{$proveedore->telefono}} <br>
                <strong>Direccion</strong>: {{$proveedore->direccion}} <br>
            </p>
            <hr>
            <div class="col">
                <a href="{{route('proveedores.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>
@endsection