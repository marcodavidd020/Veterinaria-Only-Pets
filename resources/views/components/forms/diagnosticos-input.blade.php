<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Registrar Diagnostico
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formDiagnosticosInput" action="{{ route('diagnosticos.store') }}"
                        method="post">
                        @csrf
                        <div class="col-md-12 mt-3">
                            <label for="descripcion" class="form-label fs-5">Descripcion</label>
                            <textarea type="text" class="form-control" form="formDiagnosticosInput" id="descripcion" name="descripcion" required>
                            </textarea>
                            {!! $errors->first('descripcion', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                        <div class="col-md-12">
                            <label for="vacunas" class="form-label fs-5">Vacunas</label>
                            <select class=" form-control" id="vacunas" name="vacunas[]"
                                name="vacunas" multiple="multiple">
                                <option  value="">Ninguno</option>
                                @foreach ($vacunas() as $vacuna)
                                <option value="{{ $vacuna->id }}">
                                    {{ $vacuna->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="cirugias" class="form-label fs-5">Cirugias</label>
                            <select class=" form-control" id="cirugias" name="cirugias[]"
                                name="cirugias" multiple="multiple">
                                @foreach ($cirugias() as $cirugia)
                                <option value="{{ $cirugia->id }}">
                                    {{ $cirugia->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="enfermedades" class="form-label fs-5">Enfermedades</label>
                            <select class=" form-control" id="enfermedades"
                                name="enfermedades[]" name="enfermedades" multiple="multiple">
                                <option  value="">Ninguno</option>
                                @foreach ($enfermedades() as $enfermedad)
                                <option value="{{ $enfermedad->id }}">
                                    {{ $enfermedad->nombre }} 
                                </option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="col-md-6">
                            <label for="fechas" class="form-label fs-5">Fechas</label>
                            <select class=" form-control" id="fechas"
                                name="fechas[]" name="fechas" multiple="multiple" >
                                
                                
                            </select> 
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_prox_consulta" class="form-label fs-5">Fecha de  proxima consulta</label>
                            <input type="date" class="form-control" id="fecha_prox_consulta" name="fecha_prox_consulta" required>
                            {!! $errors->first('fecha_prox_consulta', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                        <input type="text" class="form-control" id="id_historial" name="id_historial" hidden>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formDiagnosticosInput" class="btn btn-danger btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>
