<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    @if ($type == 'cirugia')
                        Actualizar datos de Cirugia
                    @elseif($type == 'enfermedad')
                        Atualizar datos de Enfermedad
                    @else
                        Actualizar datos de Vacuna
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
                        @if($type != 'vacuna')
                        <div class="col-md-4">
                            <label for="tipo" class="form-label fs-5">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo"  required>
                            {!! $errors->first('tipo', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>
                        @endif
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="{{ 'formUpdateDatos'.$type }}"
                    class="btn btn-primary btn-lg">Guardar Datos</button>
            </div>
        </div>
    </div>
</div>
