@extends('home')
@section('title', 'Mascotas')

@section('mis-mascotas', 'active')
@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
@endsection

@section('contenido')

@section('contenido')

    <div class="crud">


        <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">

        </div>
        <div class="tabla-contenedor">
            <table class="tabla">
                <thead class="thead">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>raza</th>
                        <th>sexo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    @foreach ($mascotas as $mascota)
                        <tr>
                            <td>{{ $mascota->id }}</td>
                            <td>{{ $mascota->nombre }}</td>
                            <td>{{ $mascota->especie }}</td>
                            <td>{{ $mascota->raza }}</td>
                            <td>{{ $mascota->sexo }}</td>
                            <td>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="col-3 m-2">
                                        <a href="{{ route('mascotas.show', $mascota) }}" class="button-edit" id="ver"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" title="Ver más detalles">
                                            <span class="material-icons-sharp">
                                                visibility
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-3 m-2">
                                        <a href="{{ route('historiales.show', $mascota) }}" class="button-edit" id="ver_historial"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" title="Ver Historial Clinico">
                                            <span class="material-icons-sharp">
                                                inventory
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="pagination" style="margin-top: 1rem;">
    {{$mascotas->appends('busqueda=>$busqueda')}}
  </div> --}}
    </div>
@endsection
