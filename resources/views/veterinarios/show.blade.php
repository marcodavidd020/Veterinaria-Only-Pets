@extends('home')
@section('title', 'veterinarios')

@section('registrar-datos','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>{{$veterinario->persona->nombre}} {{$veterinario->persona->apellido_paterno}} {{$veterinario->persona->apellido_materno}}</h1>
            <h3>{{$veterinario->persona->email}}</h3>
            <p>
                <strong>Ci</strong>: @if($veterinario->persona->ci)
                {{$veterinario->persona->ci}}
                @else
                ---
                @endif <br>
                <strong>Sexo</strong>: @if($veterinario->persona->sexo)
                {{$veterinario->persona->sexo}}
                @else
                ---
                @endif <br>
                <strong>Profesion</strong>: @if($veterinario->profesion)
                {{$veterinario->profesion}}
                @else
                ---
                @endif <br>
                <strong>Direccion</strong>: @if($veterinario->persona->direccion)
                {{$veterinario->persona->direccion}}
                @else
                ---
                @endif <br>
                <strong>Telefonos</strong>:
                @forelse($telefonos as $telefono)
                <span class="">{{$telefono->numero}} &nbsp;</span>
                @empty
                No tiene telefonos registrados
                @endforelse <br>
                <strong>Fecha de nacimiento</strong>: @if($veterinario->persona->fecha_de_nacimiento)
                {{$veterinario->persona->fecha_de_nacimiento}}
                @else
                ---
                @endif <br>
            </p>
            <hr>
            <p>
                <strong>Turnos</strong>: |
                @forelse($veterinario->turno_vets as $turno)
                {{$turno->horario_entrada}} - {{$turno->horario_salida}} |
                @empty
                No tiene turnos asignados
                @endforelse <br>
                <strong>Servicio</strong>:
                @if ($veterinario->servicio)
                {{$veterinario->servicio->nombre}}
                @else
                No tiene un servicio asignado
                @endif
            </p>
            <hr>
            <div class="col">
                <a href="{{route('veterinarios.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>
@endsection