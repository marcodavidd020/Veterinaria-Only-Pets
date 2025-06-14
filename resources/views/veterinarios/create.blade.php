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
<form action="{{route('administrativos.store')}}" method="POST">
    @csrf
    <div class="nombre">Nombre</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu Nombre" type="text" id="nombre" required name="nombre" value="{{old('nombre')}}">
    </div>

    <div class="apellido">Apellido Paterno</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu Apellido Paterno" type="text" id="apellido" required name="apellido_paterno" value="{{old('apellido_paterno')}}">
    </div>

    <div class="apellido">Apellido Materno</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu Apellido Materno" type="text" id="apellido" required name="apellido_materno" value="{{old('apellido_materno')}}">
    </div>

    <div class="email">Email</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu email" type="email" id="email" required name="email" value="{{old('email')}}">
    </div>

    <div class="email">Profesion</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu profesion" type="text" id="email" required name="profesion" value="{{old('profesion')}}">
    </div>

    <div class="apellido">Usuario</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu nombre de usuario" type="text" id="usuario" required name="nombre_usuario" value="{{old('nombre_usuario')}}">
    </div>

    <div class="apellido">Servicio</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa el servicio" type="text" id="servicio" required name="nombre_usuario" value="{{old('servicio')}}">
    </div>
    <div class="contraseña">Contraseña</div>

    <div class="form-group">
        <input class="myInput" type="password" id="password" placeholder="Ingresa tu contraseña" required name="password">
    </div>

    <div class="contraseña">Confirmar contraseña</div>

    <div class="form-group">
        <input class="myInput" type="password" id="Conf_password" placeholder="Repite tu contraseña" required name="password_confirmation">
    </div>

    <div class="texto2 text-center">
        <header>Acepto los terminos y condiciones del servicio</header>
    </div>

    <input type="submit" class="buttonRegistrame" value="Registrarme">
</form>
@endsection