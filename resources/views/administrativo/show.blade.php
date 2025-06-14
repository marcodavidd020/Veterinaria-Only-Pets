@extends('home')
@section('title', 'Administrativos')

@section('registrar-datos','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>{{$administrativo->persona->nombre}} {{$administrativo->persona->apellido_paterno}} {{$administrativo->persona->apellido_materno}}</h1>
            <h3>{{$administrativo->persona->email}}</h3>
            <p>
                <strong>Ci</strong>: @if($administrativo->persona->ci)
                {{$administrativo->persona->ci}}
                @else
                ---
                @endif <br>
                <strong>Sexo</strong>: @if($administrativo->persona->sexo)
                {{$administrativo->persona->sexo}}
                @else
                ---
                @endif <br>
                <strong>Profesion</strong>: @if($administrativo->profesion)
                {{$administrativo->profesion}}
                @else
                ---
                @endif <br>
                <strong>Direccion</strong>: @if($administrativo->persona->direccion)
                {{$administrativo->persona->direccion}}
                @else
                ---
                @endif <br>
                <strong>Telefonos</strong>:
                @forelse($telefonos as $telefono)
                <span class="">{{$telefono->numero}} &nbsp;</span>
                @empty
                No tiene telefonos registrados
                @endforelse <br>
                <strong>Fecha de nacimiento</strong>: @if($administrativo->persona->fecha_de_nacimiento)
                {{$administrativo->persona->fecha_de_nacimiento}}
                @else
                ---
                @endif <br>
            </p>
            <hr>
            <p>
                <strong>Turnos</strong>: |
                @forelse($administrativo->turno_admin as $turno)
                {{$turno->horario_entrada}} - {{$turno->horario_salida}} |
                @empty
                No tiene turnos asignados
                @endforelse
            </p>
            <hr>
            <div class="col">
                <a href="{{route('administrativos.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>

@endsection