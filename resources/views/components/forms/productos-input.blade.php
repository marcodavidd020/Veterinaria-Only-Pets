<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Añadir Producto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formProductosInput" action="{{ route('productos.store') }}"
                        method="post">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fs-5">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                {!! $errors->first('nombre', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label for="marca" class="form-label fs-5">Marca</label>
                                <input type="text" class="form-control" id="marca" name="marca" required>
                                {!! $errors->first('marca', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="descripcion" class="form-label fs-5">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                                {!! $errors->first('descripcion', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label for="costo" class="form-label fs-5">Costo</label>
                                <input type="number" class="form-control" id="costo" name="costo" required>
                                {!! $errors->first('costo', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label for="precio" class="form-label fs-5">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" required>
                                {!! $errors->first('precio', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>

                            <?php
                                $categorias = DB::table('categorias')->get();
                            ?>
                            <div class="col-md-6">
                                <label for="id_categoria" class="form-label fs-5">Categoria</label>
                                <select class=" form-control" id="id_categoria"
                                    name="id_categoria" required>
                                    
                                    @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">
                                        {{ $categoria->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="foto" class="form-label fs-5">Foto</label>
                                <input type="text" class="form-control" id="foto" name="foto">
                                {!! $errors->first('foto', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>


                        </div>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formProductosInput" class="btn btn-danger btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>
