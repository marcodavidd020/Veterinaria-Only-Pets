<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Añadir Compra de producto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formComprasInput" action="{{ route('productos.comprar') }}"
                        method="post">
                        @csrf
                        <div class="row mt-2">
                            <?php
                                $proveedores = DB::table('proveedores')->get();
                            ?>
                            <div class="col-md-6 mt-2">
                                <label for="id_proveedor" class="form-label fs-5">Proveedor</label>
                                <select class=" form-control" id="id_proveedor"
                                    name="id_proveedor" required>
                                    @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" >
                                        {{ $proveedor->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <?php
                                $productos = DB::table('productos')->get();
                                $i = 0;
                            ?>
                            <div class="col-md-6 mt-2">
                                <label for="id_producto" class="form-label fs-5">Producto</label>
                                <select class=" form-control" id="id_producto"
                                    name="id_producto" required>
                                    
                                    @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }},{{$producto->costo}}">
                                        {{ $producto->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="cantidad" class="form-label fs-5">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" required min="1" onchange="multiplicar();">
                                {!! $errors->first('cantidad', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="monto_total" class="form-label fs-5">Monto total</label>
                                <input type="number" class="form-control" id="monto_total" name="monto_total" required min="1" readonly>
                                {!! $errors->first('monto_total', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                        </div>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formComprasInput" class="btn btn-danger btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>




<script>

    function getCantidad() {
        var cantidad = document.getElementById("cantidad").value; 
        cantidad = (cantidad == null || cantidad == undefined || cantidad == "") ? 0: cantidad;
        return cantidad;
    }

    function getCosto() {
        var cantidad = document.getElementById("id_producto").value; 
        cantidad = (cantidad == null || cantidad == undefined || cantidad == "") ? 0: cantidad;
        var inicio = cantidad.indexOf(',');
        cantidad = cantidad.substring(inicio +1, cantidad.length);
        cantidad = parseInt(cantidad);
        return cantidad;
    }


    function multiplicar () {
    //console.log(getCantidad());
    //console.log(getCosto());
    var total = 0;	
    total = document.getElementById('monto_total').innerHTML;
	
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
	
    /* Esta es la multiplicacion. */
    total = ( getCosto() * getCantidad());
	
    // Colocar el resultado en monto_total.
    document.getElementById('monto_total').innerHTML = total;
    document.getElementById("monto_total").value = total;
    }
</script>