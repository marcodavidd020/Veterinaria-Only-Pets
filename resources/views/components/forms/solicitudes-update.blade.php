<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Actualizar datos de la solicitud
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formSolicitudesUpdate" action="" method="POST">
                        @method('PUT')
                        @csrf
                        
                        <div class="col-md-6">
                            <label for="id_cliente" class="form-label fs-5">Clientes</label>
                            <select class=" form-control" id="id_cliente" name="id_cliente" >
                                @foreach ($clientes() as $cliente)
                                <option value="{{ $cliente->id }}">
                                    {{ $cliente->persona->nombre .
                                        ' ' .
                                        $cliente->persona->apellido_paterno .
                                        ' ' .
                                        $cliente->persona->apellido_materno }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="id_mascota" class="form-label fs-5">Mascota</label>
                            <select class=" form-control" id="id_mascota"
                                name="id_mascota" >
                                @foreach ($mascotas() as $mascota)
                                <option value="{{ $mascota->id }}">
                                    {{ $mascota->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="servicios" class="form-label fs-5">Servicios</label>
                            <select class=" form-control" id="servicios"
                                 name="servicios" >
                                 <option value="">Ninguno</option>
                                @foreach ($servicios() as $servicio)
                                <option value="{{ $servicio->id }}">
                                    {{ $servicio->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="id_recibo" class="form-label fs-5">Id de Recibo</label>
                            <select class=" form-control" id="id_recibo"
                                name="id_recibo" >
                                @foreach ($recibos() as $recibo)
                                <option value="{{ $recibo->id }}">
                                    {{ $recibo->id }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formSolicitudesUpdate" class="btn btn-danger btn-lg">Guardar Datos</button>
            </div>
        </div>
    </div>
</div>
