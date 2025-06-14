<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Actualizar datos de Solicitud De Servicio
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="{{ 'formUpdateDatos'.$type }}" action="" method="post">
                        @method('PUT')
                        @csrf

                        <div class="col-md-4">
                            <label for="id_cliente" class="form-label fs-5">Id cliente</label>
                            <input type="text" class="form-control" id="id_cliente" name="id_cliente" required>
                            
                            {!! $errors->first('id_cliente', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="id_servicio" class="form-label fs-5">Id servicio</label>
                            <input type="text" class="form-control" id="id_servicio" name="id_servicio" >
                            
                            {!! $errors->first('id_servicio', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="id_recibo" class="form-label fs-5">Id recibo</label>
                            <input type="text" class="form-control" id="id_recibo" name="id_recibo" required>
                            {!! $errors->first('id_recibo', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="{{ 'formUpdateDatos' . $type }}" class="btn btn-primary btn-lg">Guardar Datos</button>
            </div>
        </div>
    </div>
</div>