@extends('auth.register')


@section('formulario')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('administrativos.update', $administrativo)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="nombre">Nombre</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu Nombre" type="text" id="nombre" required name="nombre"
            value="{{old('nombre', $administrativo->persona->nombre)}}">
    </div>

    <div class="apellido">Apellido Paterno</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu Apellido Paterno" type="text" id="apellido" required
            name="apellido_paterno" value="{{$administrativo->persona->apellido_paterno}}">
    </div>

    <div class="apellido">Apellido Materno</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu Apellido Materno" type="text" id="apellido" required
            name="apellido_materno" value="{{$administrativo->persona->apellido_materno}}">
    </div>

    <div class="email">Email</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu email" type="email" id="email" required name="email"
            value="{{$administrativo->persona->email}}">
    </div>

    <div class="email">Profesion</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu profesion" type="text" id="email" required name="profesion"
            value="{{$administrativo->profesion}}">
    </div>

    <div class="apellido">Ci</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu nombre de Ci" type="text" id="apellido" name="ci"
            value="{{$administrativo->persona->ci}}">
    </div>

    <div class="apellido">Direccion</div>

    <div class="form-group">
        <input class="myInput" type="text" id="apellido" placeholder="Ingresa tu direccion" name="direccion"
            value="{{$administrativo->persona->direccion}}">
    </div>

    <div class="apellido">Fecha de nacimiento</div>

    <div class="form-group">
        <input class="myInput" type="date" id="apellido" name="fecha_de_nacimiento"
            value="{{$administrativo->persona->fecha_de_nacimiento}}">
    </div>

    <div class="apellido">Sexo</div>
    <div class="form-group">
        <input class="myInput" type="text" id="apellido" name="sexo" placeholder="M/F"
            value="{{$administrativo->persona->sexo}}">
    </div>

    <div class="texto2 text-center">
        <header>Acepto los terminos y condiciones del servicio</header>
    </div>
    <input type="submit" class="buttonRegistrame" value="Registrarme">
</form>

@endsection