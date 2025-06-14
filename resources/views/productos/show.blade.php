@extends('home')
@section('title', 'Producto')

@section('petshop','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>{{$producto->nombre}}</h1>
            <h3>{{$producto->marca}}</h3>
            <p>
                <strong>Costo</strong>: {{$producto->costo}} <br>
                <strong>Precio</strong>: {{$producto->precio}} <br>
                <strong>Cantidad</strong>: {{$producto->cantidad}} <br>
                <strong>Categoria</strong>: {{$producto->categoria->nombre}} <br>
                <strong>Descripcion</strong>: {{$producto->descripcion}} <br>
            </p>
            <hr>
            <div class="col">
                <a href="{{route('productos.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>
@endsection