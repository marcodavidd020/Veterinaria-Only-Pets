@extends('home')
@section('title', 'Roles y Permisos')
@section('roles', 'active')
@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
@endsection
@section('contenido')

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Crear Rol</h2>


    </div>
    <div class="card-body px-5">
        <form action="{{route('roles.update',$role)}}" method="post" id="form-update-rol">
            @method('PUT')
            @csrf
            <div class="form-group mb-3">
                <label for="name-role" class="h3">Nombre</label>
                <input type="text" name="name" value="{{$role->name}}" id="name-role" placeholder="Ingrese nombre del Rol" class="form-control" required>
            </div>

            <h3 class="h3"> Lista de permisos</h3>
            
            <div class="accordion" id="accordionExample">
                @foreach($permissions as $key => $value)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$key}}" aria-expanded="false" aria-controls="collapse-{{$key}}">
                      <span style="text-transform: capitalize;">{{$key}}</span>
                    </button>
                  </h2>
                  <div id="collapse-{{$key}}" class="accordion-collapse collapse" aria-labelledby="headingOne" >
                    <div class="accordion-body">
                      <div class="row d-flex">
                        @foreach($value as $name => $permisos)
                          <div class="col-lg-3 col-mb-6 col-md-6">
                            <h2 class="h4" style="text-transform: uppercase">{{$name}}</h2>
                            @foreach($permisos as $permission)
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$permission->id}}" 
                              @if($role->permissions->contains($permission->id))
                                checked
                              @elseif($role->name =="super-admin")
                                checked
                                disabled
                                @endif
                                >
                             <label class="form-check-label" for="gridCheck" style="text-transform: capitalize">
                                {{$permission->description}}
                              </label>
                            </div>
                            @endforeach
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
        </form>
    </div>
    <div class="card-footer ">
        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary" form="form-update-rol">Crear Rol</button>
    </div>
    </div>
</div>

@endsection
