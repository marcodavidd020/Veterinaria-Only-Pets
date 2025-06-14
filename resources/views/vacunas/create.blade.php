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
<form action="{{route('Vacuna.store')}}" method="POST">
    @csrf 
    <div class="id">Nombre</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa el id de la vacuna" type="text" id="id" required name="id" value="{{old('id')}}">
    </div>

    <div class="nombre">Nombre</div>

    <div class="form-group">
        <input class="myInput" placeholder="Ingresa el Nombre de la vacuna" type="text" id="nombre" required name="nombre" value="{{old('nombre')}}">
    </div>

    <input type="submit" class="buttonRegistrame" value="Registrar">
</form>
@endsection