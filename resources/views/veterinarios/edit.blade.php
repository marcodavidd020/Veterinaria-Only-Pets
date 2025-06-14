@extends('auth.register')

@section('title', 'Editar')
@section('contenido', 'Editar')

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
<form >
    @csrf
    @method('PUT')
    <div class="nombre">Nombre</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu Nombre" type="text" id="nombre" required name="nombre"
            >
    </div>

    <div class="apellido">Apellido Paterno</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu Apellido Paterno" type="text" id="apellido" required
            name="apellido_paterno" >
    </div>

    <div class="apellido">Apellido Materno</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu Apellido Materno" type="text" id="apellido" required
            name="apellido_materno" >
    </div>

    <div class="email">Email</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu email" type="email" id="email" required name="email"
            >
    </div>

    <div class="email">Profesion</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu profesion" type="text" id="email" required name="profesion"
            >
    </div>

    <div class="apellido">Ci</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa tu nombre de Ci" type="text" id="apellido" name="ci"
            >
    </div>

    <div class="apellido">Servicio</div>
    <div class="form-group">
        <input class="myInput" placeholder="Ingresa su servicio" type="text" id="apellido" name="servicio"
            >
    </div>

    <div class="apellido">Direccion</div>

    <div class="form-group">
        <input class="myInput" type="text" id="apellido" placeholder="Ingresa tu direccion" name="direccion"
            >
    </div>

    <div class="apellido">Fecha de nacimiento</div>

    <div class="form-group">
        <input class="myInput" type="date" id="apellido" name="fecha_de_nacimiento"
            >
    </div>

    <div class="apellido">Sexo</div>
    <div class="form-group">
        <input class="myInput" type="text" id="apellido" name="sexo" placeholder="M/F"
            >
    </div>

    <div class="texto2 text-center">
        <header>Acepto los terminos y condiciones del servicio</header>
    </div>

    <input type="submit" class="buttonRegistrame" value="Registrarme">
</form>
@endsection