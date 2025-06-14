@extends('home')
@section('title', 'Servicios')

@section('servicio','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>{{$servicio->nombre}}</h1>
            <p>
                <strong>Precio</strong>: @if($servicio->precio)
                {{$servicio->precio}}
                @else
                ---
                @endif <br>
                <strong>Descripcion</strong>: @if($servicio->descripcion)
                {{$servicio->descripcion}}
                @else
                ---
                @endif <br>
                <strong>Numero de cuotas</strong>:
                {{$servicio->plan_de_pagos->nro_cuotas ?? 'No tiene numero de cuotas'}}
                <br>
                <strong>Monto de cuota</strong>:
                {{$servicio->plan_de_pagos->monto_cuota ?? 'No tiene nonto de cuotas'}}
                <br>
            <div class="col">
                <a href="{{route('servicios.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>

@endsection