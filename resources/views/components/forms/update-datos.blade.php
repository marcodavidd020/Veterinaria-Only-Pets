<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    @if ($type == 'administrativo')
                        Actualizar datos de Administrativo
                    @elseif($type == 'veterinario')
                        Atualizar datos de Veterinario
                    @else
                        Actualizar datos de Cliente
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="{{ 'formUpdateDatos'.$type }}" action=""  method="post">
                        @method('PUT')
                        @csrf
                         

                        <div class="col-md-4">
                            <label for="nombre" class="form-label fs-5">Nombre</label>
                            <input type="text" class="form-control " id="nombre" name="nombre" required>
                            {!! $errors->first('nombre', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="apellido_paterno" class="form-label fs-5">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"  required>
                            {!! $errors->first('apellido_paterno', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="apellido_materno" class="form-label fs-5">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
                            {!! $errors->first('apellido_materno', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="ci" class="form-label fs-5">CI</label>
                            <input type="number" class="form-control" id="ci" name="ci"  required>
                            {!! $errors->first('ci', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label fs-5">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            {!! $errors->first('email', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="fecha_de_nacimiento" class="form-label fs-5">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_de_nacimiento"
                                name="fecha_de_nacimiento" required >
                            {!! $errors->first('fecha_de_nacimiento', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="telefono" class="form-label fs-5">Telefono</label>
                            <div class="col-xl-12">
                                <select type="number" class="form-control update-datos-telefono-{{ $type }}"
                                    id="telefonoUpdate" name="telefonos[]" multiple="multiple" required>
                                </select>
                            </div>
                            {!! $errors->first('telefono', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-8">
                            <label for="direccion" class="form-label fs-5">Dirección</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Zona, Avenida, calle"
                                name="direccion"  required>
                            {!! $errors->first('direccion', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="sexo" class="form-label fs-5">Sexo</label>
                            <div class="row px-5">
                                <div class="col-sm-5 form-check pl-2">
                                    <input class="form-check-input" type="radio" id="sexoM" value="M" name="sexo">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Masculino
                                    </label>
                                </div>
                                <div class="col-sm-5 form-check">
                                    <input class="form-check-input" type="radio" id="sexoF" value="F" name="sexo">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Femenino
                                    </label>
                                </div>
                            </div>
                            {!! $errors->first('sexo', '<span class="help-block text-danger">*:message</span>') !!}
                            @if ($type != 'cliente')

                                <label for="turno" class="col-sm-2 col-form-label fs-5">Turno</label>
                                <div class="row px-5">
                                    <div class="col-sm-10 form-check pl-2" id="turno">
                                        <select class="form-select" name="turno" aria-label="Default select example">
                                            <option selected>Ninguno</option>
                                            @foreach ($getTurnos() as $turno)
                                                <option value="{{ $turno->id }}">
                                                    {{ Carbon\Carbon::parse($turno->horario_entrada)->format('H:i') . '-' . Carbon\Carbon::parse($turno->horario_salida)->format('H:i') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                        </div>
                        @if ($type != 'cliente')
                            <div class="col-md-8 align-items-center {{ $type == 'administrativo' ? 'pt-4' : '' }}">

                                <label for="profesion" class="form-label fs-5">Profesión</label>
                                <input type="text" class="form-control" id="profesion" name="profesion" >
                                {!! $errors->first('profesion', '<span class="help-block text-danger">*:message</span>') !!}
                                @if ($type == 'veterinario')
                                    <div class="row mt-4">
                                        <label for="especialidad" class="col-sm-2 col-form-label fs-5">Servicio</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" id="servicio" name="servicio" aria-label="Default select example">
                                                <option value="" selected>Ninguno</option>
                                                @foreach ($getServicios() as $servicio)
                                                    <option value="{{ $servicio->id }}">
                                                        {{ $servicio->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        @endif

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="{{ 'formUpdateDatos'.$type }}"
                    class="btn btn-danger btn-lg">Guardar Datos</button>
            </div>
        </div>
    </div>
</div>
