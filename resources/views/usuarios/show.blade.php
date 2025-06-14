@extends('home')
@section('title', 'usuario')

@section('registrar-datos','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>{{$usuario->persona->nombre}} {{$usuario->persona->apellido_paterno}} {{$usuario->persona->apellido_materno}}</h1>
            <h3>{{$usuario->persona->email}}</h3>
            <p>
                <strong>User Name</strong>: @if($usuario->persona->ci)
                {{$usuario->nombre_usuario}}
                @else
                ---
                @endif <br>
                <strong>Ci</strong>: @if($usuario->persona->ci)
                {{$usuario->persona->ci}}
                @else
                ---
                @endif <br>
                <strong>Sexo</strong>: @if($usuario->persona->sexo)
                {{$usuario->persona->sexo}}
                @else
                ---
                @endif <br>
                
                <strong>Direccion</strong>: @if($usuario->persona->direccion)
                {{$usuario->persona->direccion}}
                @else
                ---
                @endif <br>

                <strong>Telefonos</strong>:
                @forelse($telefonos as $telefono)
                <span class="">{{$telefono->numero}} &nbsp;</span>
                @empty
                No tiene telefonos registrados
                @endforelse <br>

                <strong>Fecha de nacimiento</strong>: @if($usuario->persona->fecha_de_nacimiento)
                {{$usuario->persona->fecha_de_nacimiento}}
                @else
                ---
                @endif <br>
            </p>
            <hr>
            <p>
                <strong >Rol</strong>:
                @forelse($usuario->roles as $rol)
                <span style="text-transform: capitalize;">{{$rol->name}} </span>
                @empty
                No tiene roles registrados
                @endforelse <br>
            </p>
            <hr>
            
            <div class="col">
                <a href="{{route('usuarios.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>

@endsection