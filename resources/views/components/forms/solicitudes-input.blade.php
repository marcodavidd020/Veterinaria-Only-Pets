<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Añadir Solicitud De Servicio
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formSolicitudesInput" action="{{ route('solicitudes.store') }}"
                        method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="id_cliente" class="form-label fs-5">Cliente</label>
                            <select class=" form-control" id="id_cliente"
                                name="id_cliente" required>
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
                                name="id_mascota" required>
                                @foreach ($mascotas() as $mascota)
                                <option value="{{ $mascota->id }}">
                                    {{ $mascota->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="servicios" class="form-label fs-5">Servicios</label>
                            <select class=" form-control" id="servicios"
                                name="servicios[]" name="servicios" multiple="multiple" required>
                                <option  value="">Ninguno</option>
                                @foreach ($servicios() as $servicio)
                                <option value="{{ $servicio->id }}">
                                    {{ $servicio->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="concepto" class="form-label fs-5">Concepto</label>
                            <textarea type="text" class="form-control" form="formSolicitudesInput" id="concepto" name="concepto" required>
                            </textarea>
                            {!! $errors->first('concepto', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                        <div class="col-md-4">
                            <label for="monto_cancelado" class="form-label fs-5">Monto cancelado</label>
                            <input type="number" class="form-control" id="monto_cancelado" name="monto_cancelado" required>
                            {!! $errors->first('monto_cancelado', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                        <div class="col-md-4">
                            <label for="saldo" class="form-label fs-5">Saldo</label>
                            <input type="number" class="form-control" id="saldo" name="saldo" required>
                            {!! $errors->first('saldo', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>

                        <div class="col-md-4">
                            <label for="monto_total" class="form-label fs-5">Monto Total</label>
                            <input type="number" class="form-control" id="monto_total" name="monto_total" required>
                            {!! $errors->first('monto_total', '<span class="help-block text-danger">*:message</span>') !!}
                        </div>


                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formSolicitudesInput" class="btn btn-danger btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>
