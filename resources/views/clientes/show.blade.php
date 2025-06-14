@extends('home')
@section('title', 'cliente')

@section('registrar-datos','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>{{$cliente->persona->nombre}} {{$cliente->persona->apellido_paterno}} {{$cliente->persona->apellido_materno}}</h1>
            <h3>{{$cliente->persona->email}}</h3>
            <p>
                <strong>Ci</strong>: @if($cliente->persona->ci)
                {{$cliente->persona->ci}}
                @else
                ---
                @endif <br>
                <strong>Sexo</strong>: @if($cliente->persona->sexo)
                {{$cliente->persona->sexo}}
                @else
                ---
                @endif <br>
                
                <strong>Direccion</strong>: @if($cliente->persona->direccion)
                {{$cliente->persona->direccion}}
                @else
                ---
                @endif <br>

                <strong>Telefonos</strong>:
                @forelse($telefonos as $telefono)
                <span class="">{{$telefono->numero}} &nbsp;</span>
                @empty
                No tiene telefonos registrados
                @endforelse <br>

                <strong>Fecha de nacimiento</strong>: @if($cliente->persona->fecha_de_nacimiento)
                {{$cliente->persona->fecha_de_nacimiento}}
                @else
                ---
                @endif <br>
            </p>
            <hr>
            <p>
                {{-- <strong>Mascotas</strong>: |
                @forelse($cliente->mascota_clientes as $mascota)
                {{$mascota->nombre}} |
                @empty
                No tiene mascota asignados
                @endforelse <br> --}}
            </p>
            <hr>
            <div class="col">
                <a href="{{route('clientes.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>
@endsection