@extends('layouts.master')
@section('title', 'Home')


@section('head')
    <!-- Material CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- Libreria select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />



@section('css-derecha')
@show
@endsection


@section('principal')

<div class="container">
    <!-- Panel -->
    <aside>
        <div class="top">
            <div class="logo">
                <img src="/images/home/logo.png">
                <h2>
                    <div class="texto-black">
                        <div class="letra-veterinaria">VETERINARIA</div>
                    </div><span class="danger"> ONLY PET{{ '\'' }}S</span>
                </h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
            </div>
        </div>
        <div class="sidebar">
            <a href="/home" class=@yield('home', '')>
                <span class="material-icons-sharp">home</span>
                <h3>Inicio</h3>
            </a>
            
            @can('usuarios.index')
                <a href="{{ route('usuarios.index') }}" class=@yield('usuario', '')>
                    <span class="material-icons-sharp">person</span>
                    <h3>Usuario</h3>
                </a>
            @endcan

            @canany(['administrativos.index', 'mascotas.index', 'clientes.index', 'veterinarios.index'])
                <a href="{{ route('datos') }}" class=@yield('registrar-datos', '')>
                    <span class="material-icons-sharp">app_registration</span>
                    <h3>Datos</h3>
                </a>
            @endcanany

            @canany(['cirugias.index', 'enfermedades.index', 'vacunas.index', 'historiales.index'])
                <a href="{{ route('historialClinico') }}" class=@yield('historial-clinico', '')>
                    <span class="material-icons-sharp">description</span>
                    <h3>Historial Clinico</h3>
                </a>
            @endcanany

            @canany(['servicios.index','cita-servicio.index','turnos.index'])
                <a href="{{ route('servicio') }}" class=@yield('servicio', '')>
                    <span class="material-icons-sharp">control_point</span>
                    <h3>Servicio</h3>
                </a>
            @endcanany
                

            @canany(['proveedores.index','productos.index','categorias.index'])
            <a href="{{ route('petshop') }}" class=@yield('petshop', '')>

                <span class="material-icons-sharp">shopping_cart</span>
                <h3>Pet Shop</h3>
            </a>
            @endcanany

            @canany(['bitacora'])
            <a href="{{route('bitacoras.index')}}" class=@yield('bitacoras', '')>
                <span class="material-icons-sharp">pending_actions</span>
                <h3>Bitacora</h3>
            </a>
            @endcanany

            @can('roles.index')
            <a href="{{route('roles.index')}}" class=@yield('roles', '')>
                <span class="material-icons-sharp">group</span>
                <h3>Roles y Permisos</h3>
            </a>
            @endcan

            @role('cliente')
            <a href="{{route('mascotas.my')}}" class=@yield('mis-mascotas', '')>
                <span class="material-icons-sharp">pets</span>
                <h3>Mis Mascotas</h3>
            </a>
            @endrole
  

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">
                    <a>
                        <span class="material-icons-sharp">logout</span>
                        <h3>Cerrar Sesion</h3>
                    </a>
                </button>
            </form>
        </div>
    </aside>
    <div class="derecha">
        <div class="top-panel">
            <button id="menu-btn">
                <span class="material-icons-sharp">menu</span>
            </button>
            <div class="theme-toggler">
                <span class="material-icons-sharp active">light_mode</span>
                <span class="material-icons-sharp">dark_mode</span>
            </div>
            <div class="profile">
                <div class="info">
                    <strong>{{ Auth::user()->persona->nombre.' '.Auth::user()->persona->apellido_paterno.' '.Auth::user()->persona->apellido_materno}}</strong>
                    <br>
                    <small class="text-muted" style="text-transform: capitalize"> {{ implode('-' , Auth::user()->roles->pluck('name')->toArray() ) }} </small>
                </div> 
            </div>
        </div>
        <div class="contenido">
            @section('contenido')

            @show
        </div>
    </div>
</div>
@section('body-final')
@show

@endsection



@section('js')
    <script src="{{ asset('js/home.js') }}"></script>
    <!-- Libreria jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    @section('js-home')
    @show
@endsection
