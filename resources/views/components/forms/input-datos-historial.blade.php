<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    @if ($type == 'cirugia')
                        Añadir Cirugia
                    @elseif($type == 'enfermedad')
                        Añadir Enfermedad
                    @elseif($type == 'vacuna')
                        Añadir Vacuna
                    @else
                        Añadir Historial Clinico
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="{{ 'formInputDatos' . $type }}" action= @if($type != 'enfermedad' && $type != 'historial')
                    "{{ route($type . 's.store') }}"
                    @else
                    "{{ route($type . 'es.store') }}"
                    @endif
                        method="post">
                        @csrf

                        @if($type != 'historial')
                            <div class="col-md-4">
                                <label for="nombre" class="form-label fs-5">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                {!! $errors->first('nombre', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                        
                            @if($type != 'vacuna')
                            <div class="col-md-4">
                                <label for="tipo" class="form-label fs-5">Tipo</label>
                                <input type="text" class="form-control" id="tipo" name="tipo"
                                    required>
                                {!! $errors->first('tipo', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                            @endif

                        @endif

                        @if($type == 'historial')
                        <div class="col-md-6">
                            <label for="descripcion" class="form-label fs-5">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" placeholder="Descripcion"
                                name="direccion" required>
                            {!! $errors->first('descripcion', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_consulta" class="form-label fs-5">Fecha de consulta</label>
                            <input type="date" class="form-control" id="fecha_consulta" placeholder="Fecha de consulta"
                                name="fecha_consulta" required>
                            {!! $errors->first('fecha_consulta', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_prox_consulta" class="form-label fs-5">Fecha de proxima consulta</label>
                            <input type="date" class="form-control" id="fecha_prox_consulta" placeholder="Fecha de proxima consulta"
                                name="fecha_prox_consulta" required>
                            {!! $errors->first('fecha_prox_consulta', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                        <label for="Cirugia" class="form-label fs-5">Cirugia</label>
                        <div class="col-md-3">
                            <label for="nombre" class="form-label fs-6">Nombre</label>
                            <select class="form-select" aria-label="Default select example" name="nombre">
                                <option selected>Ninguno</option>
                                <option selected>otra opcion de opcion</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="fecha" class="form-label fs-6">Fecha</label>
                            <input type="date" class="form-control" id="fecha" placeholder="Fecha"
                                name="fecha" required>
                            {!! $errors->first('fecha', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-3">
                            <label for="hora" class="form-label fs-6">Hora</label>
                            <input type="time" class="form-control" id="hora" placeholder="Hora"
                                name="hora" required>
                            {!! $errors->first('hora', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>   
                        <div class="col-md-3">
                            <label for="veterinario_encargado" class="form-label fs-6">Veterinario encargado</label>
                            <input type="text" class="form-control" id="veterinario_encargado" placeholder="Veterinario"
                                name="veterinario_encargado" required>
                            {!! $errors->first('veterinario_encargado', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                        <label for="Enfermedad" class="form-label fs-5">Enfermedad</label>
                        <div class="col-md-3" style="margin-left: 50px">
                            <label for="fecha_deteccion" class="form-label fs-6">Fecha de deteccion</label>
                            <input type="date" class="form-control" id="fecha_deteccion" placeholder="Fecha de deteccion"
                                name="fecha_deteccion" required>
                            {!! $errors->first('fecha_deteccion', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-3">
                            <label for="inicio_tratamiento" class="form-label fs-6">Inicio de tratamiento</label>
                            <input type="date" class="form-control" id="inicio_tratamiento" placeholder="Fecha"
                                name="inicio_tratamiento" required>
                            {!! $errors->first('inicio_tratamiento', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-3">
                            <label for="fin_tratamiento" class="form-label fs-6">Fin de tratamiento</label>
                            <input type="date" class="form-control" id="fin_tratamiento" placeholder="Fecha"
                                name="fin_tratamiento" required>
                            {!! $errors->first('fin_tratamiento', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                        <label for="Vacuna" class="form-label fs-5">Vacuna</label>
                        <div class="col-md-3" style="margin-left: 50px">
                            <label for="fecha_aplicacion" class="form-label fs-6">Fecha de apliacion</label>
                            <input type="date" class="form-control" id="fecha_aplicacion" placeholder="Fecha de apliacion"
                                name="fecha_aplicacion" required>
                            {!! $errors->first('fecha_aplicacion', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-3">
                            <label for="dosis" class="form-label fs-6">Dosis</label>
                            <input type="number" class="form-control" id="dosis" placeholder="Dosis"
                                name="dosis" min="1" required>
                            {!! $errors->first('dosis', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_prox_aplicacion" class="form-label fs-6">Fecha proxima apliacion</label>
                            <input type="date" class="form-control" id="fecha_prox_aplicacion" placeholder="Fecha"
                                name="fecha_prox_aplicacion" required>
                            {!! $errors->first('fecha_prox_aplicacion', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        
                        @endif
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="{{ 'formInputDatos' . $type }}"
                    class="btn btn-primary btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>
