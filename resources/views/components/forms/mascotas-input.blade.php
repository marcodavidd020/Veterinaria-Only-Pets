<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Añadir Mascota
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formMascotasInput" action="{{ route('mascotas.store') }}"
                        method="post">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fs-5">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                {!! $errors->first('nombre', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label for="especie" class="form-label fs-5">Especie</label>
                                <input type="text" class="form-control" id="especie" name="especie" required>
                                {!! $errors->first('especie', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <label for="raza" class="form-label fs-5">raza</label>
                                        <input type="text" class="form-control" id="raza" name="raza" required>
                                        {!! $errors->first('raza', '<span class="help-block text-danger">*:message</span>') !!}
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="fecha_de_nacimiento" class="form-label fs-5">Fecha de
                                            nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_de_nacimiento"
                                            name="fecha_de_nacimiento" required>
                                        {!! $errors->first('fecha_de_nacimiento', '<span class="help-block text-danger">*:message</span>') !!}
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="sexo" class="form-label fs-5">Sexo</label>
                                        <div class="row px-5">
                                            <div class="col-sm-5 form-check pl-2">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault1"
                                                    value="Macho" name="sexo">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Macho
                                                </label>
                                            </div>
                                            <div class="col-sm-5 form-check">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault2"
                                                    value="Hembra" name="sexo">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Hembra
                                                </label>
                                            </div>
                                        </div>
                                        {!! $errors->first('sexo', '<span class="help-block text-danger">*:message</span>') !!}
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="descripción" class="form-label fs-5">Descripción</label>
                                        <textarea type="text" class="form-control" form="formMascotasInput" id="descripcion" placeholder="Zona, Avenida, calle" name="descripcion">
                                        </textarea>
                                        {!! $errors->first('descripcion', '<span class="help-block text-danger">*:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="row h-100">
                                    <div class="col-12 mt-3">
                                        <label for="duenho" class="form-label fs-5">Dueños</label>
                                        <select class=" form-control" id="duenhos" name="duenhos[]"
                                            name="duenho" multiple="multiple">
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
                                </div>
                            </div>


                        </div>


                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formMascotasInput" class="btn btn-danger btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>
