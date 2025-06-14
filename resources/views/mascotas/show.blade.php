@extends('home')
@section('title', 'mascotas3')
@php
    $active = Auth::user()->hasRole('cliente')?'mis-mascotas':'registrar-datos';
@endphp
@section($active,'active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>{{$mascota->nombre}}</h1>
            <p>
                {{-- <strong>Peso</strong>: @if($mascota->peso)
                {{$mascota->peso}}
                @else
                ---
                @endif <br> --}}
                <strong>Sexo</strong>: @if($mascota->sexo)
                {{$mascota->sexo}}
                @else
                ---
                @endif <br>
                <strong>Raza</strong>: @if($mascota->raza)
                {{$mascota->raza}}
                @else
                ---
                @endif <br>

                <strong>Especie</strong>: @if($mascota->especie)
                {{$mascota->especie}}
                @else
                ---
                @endif <br>

                <strong>Fecha de nacimiento</strong>: @if($mascota->fecha_nacimiento)
                {{$mascota->fecha_nacimiento}}
                @else
                ---
                @endif <br>

                <strong>Descripcion</strong>: @if($mascota->descripcion)
                {{$mascota->descripcion}}
                @else
                ---
                @endif <br>

                
            </p>
            <hr>
            <p>
                <strong>Dueños</strong>: @foreach ($mascota->propietario as $propietario)
                | {{$propietario->nombre.' '.$propietario->apellido_paterno.' '.$propietario->apellido_materno}}
                @endforeach|
   
            </p>
            <hr>
            
            <div class="col">
                <a   @if (!Auth::user()->hasRole('cliente'))
                    href="{{ route('mascotas.index') }}"
                    @else
                      href="{{route('mascotas.my')}}"
                    @endif
                   class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>

@endsection