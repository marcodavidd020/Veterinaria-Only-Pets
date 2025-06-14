@extends('home')
@section('title', 'Roles y Permisos')
@section('roles', 'active')
@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
@endsection
@section('contenido')


    <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
        @can('roles.create')
            <div class="registrar">
                <a href="{{route('roles.create')}}" class="buttonRegistrame">
                    Crear Rol
                </a>
            </div>
        @endcan
    </div>

    <div class="tabla-contenedor">
        <table class="tabla">
            <thead class="thead">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th style="width:20%">Accion</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($roles as $rol)
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->name }}</td>
                        <td>
                            <div class="d-flex flex-row justify-content-around">
                                @can('roles.edit')
                                    <a href=" {{ route('roles.edit', $rol) }}" class="button-edit">
                                        <span class="material-icons-sharp">
                                            edit
                                        </span>
                                    </a>
                                @endcan
                                @can('roles.destroy')
                                @if($rol->name != 'super-admin')
                                    <form action="{{ route('roles.destroy', $rol) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <span class="material-icons-sharp">
                                                delete
                                            </span>
                                        </button>
                                    </form>
                                    
                                @endif
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination" style="margin-top: 1rem;">
        {{ $roles->links() }}
    </div>


@endsection
