<!-- Modal -->
<div class="modal fade" id="input-vacuna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar vacuna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('vacunas.store')}}" method="post" id="idregistrar">
            @csrf
                <div class="col-md-12">
                <label for="nombre" class="form-label fs-5">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                {!! $errors->first('nombre', '<span class="help-block text-danger">*:message</span>') !!}
            </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submmit" form="idregistrar" class="btn btn-primary" >Registrar</button>
        </div>
      </div>
    </div>
  </div>