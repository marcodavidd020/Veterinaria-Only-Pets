@extends('layouts.master')
@section('title', 'Login')
@section('head')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('principal')
    <div class="encabezadoSombra">
        <div class="textoEncabezado">Clinica veterinaria Only Pet{{ '\'' }}s
        </div>
        <div class="encabezado">
        </div>
    </div>

    <!-- funcion boostrap crea un cuadrado en medio de la pantalla dado parametros en css -->
    <div class="container">
        <div class="rectanguloGrande">
            <div class="row">
                <div class="col-md-6">
                    <div class="rectanguloIzquierdo">
                        <div class="textIniciarSesion text-center">
                            <header>Iniciar Sesion</header>
                        </div>
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="email">Email</div>

                            <div class="form-group">
                                <input class="myInput" placeholder="Ingresa tu email" type="text" id="nombre_usuario"
                                    name="nombre_usuario" value="{{old('nombre_usuario')}}"
                                    required>
                            </div>

                            <div class="contraseña">Contraseña</div>

                            <div class="form-group">
                                <input class="myInput" type="password" id="password" name="password"
                                    placeholder="Ingresa tu contraseña" required>
                            </div>

                            <input type="submit" class="buttonIniciarSesion" value="Iniciar Sesión">
                            @error('nombre_usuario')
                                <div class="alert alert-danger mt-1 text-center">
                                    {{$message}}
                                </div>
                                @enderror
                        </form>
                        <div class="texto text-center">
                            <header>¿Todavia no tienes una cuenta?</header>
                        </div>
                        <div class="texto1 text-center">
                            <a class="texto_registro" href="{{ route('register') }}">Registrate aqui</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rectanguloDerecho">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection