<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Actualizar datos de la categoria
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formCategoriasUpdate" action="" method="POST">
                        @method('PUT')
                        @csrf              
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for="nombre" class="form-label fs-5">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                {!! $errors->first('nombre', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                        </div>
                        <input type="text" id="id" name="id" hidden>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formCategoriasUpdate" class="btn btn-danger btn-lg">Guardar Datos</button>
            </div>
        </div>
    </div>
</div>
