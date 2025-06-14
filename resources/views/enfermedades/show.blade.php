@extends('home')
@section('title', 'Enfermedades')

@section('historial-clinico','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>{{ $enfermedad->nombre }}</h1>
            <strong>Tipo</strong>: @if($enfermedad->tipo)
                {{$enfermedad->tipo}}
            @else
            @endif
            <div class="col" style="margin-top: 2.5%;">
                <a href="{{route('enfermedades.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>

@endsection