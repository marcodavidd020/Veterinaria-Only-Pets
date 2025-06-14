<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Añadir Turno
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formTurnosInput" action="{{ route('turnos.store') }}"
                        method="post">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="horario_entrada" class="form-label fs-5">Horario de entrada</label>
                                <input type="time" class="form-control" id="horario_entrada" name="horario_entrada" required>
                                {!! $errors->first('horario_entrada', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label for="horario_salida" class="form-label fs-5">Horario de salida</label>
                                <input type="time" class="form-control" id="horario_salida" name="horario_salida" required>
                                {!! $errors->first('horario_salida', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                        </div>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formTurnosInput" class="btn btn-danger btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>
