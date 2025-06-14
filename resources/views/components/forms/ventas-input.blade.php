<div class="modal  fade" id="{{ $id }}" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start fs-4" id="exampleModalLabel">
                    Añadir Venta de productos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <form class="row g-3" id="formVentasInput" action="{{ route('productos.vender') }}"
                        method="post">
                        @csrf
                        <div class="row mt-2">
                            
                            <div class="col-md-12 mt-3">
                                <label for="concepto" class="form-label fs-5">Descripcion</label>
                                <textarea type="concepto" class="form-control" form="formVentasInput" id="concepto" name="concepto" placeholder="La venta se realizo a ...." required>
                                </textarea>
                                {!! $errors->first('concepto', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>

                            <?php
                                $productos = DB::table('productos')->get();
                            ?>
                            <div class="col-md-6 mt-2">
                                <label for="id_producto" class="form-label fs-5">Producto</label>
                                <select class=" form-control" id="id_producto2"
                                    name="id_producto" required>
                                    
                                    @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }},{{$producto->precio}}">
                                        {{ $producto->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="cantidad" class="form-label fs-5">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad2" name="cantidad" required min="1" onchange="multiplicar2();">
                                {!! $errors->first('cantidad', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="monto_total" class="form-label fs-5">Monto total</label>
                                <input type="number" class="form-control" id="monto_total2" name="monto_total" required min="1" readonly>
                                {!! $errors->first('monto_total', '<span class="help-block text-danger">*:message</span>') !!}
                            </div>
                        </div>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <button type="submmit" form="formVentasInput" class="btn btn-danger btn-lg">Añadir</button>
            </div>
        </div>
    </div>
</div>


<script>

    function getCantidad2() {
        var cantidad = document.getElementById("cantidad2").value; 
        //console.log("cant = " + cantidad);
        cantidad = (cantidad == null || cantidad == undefined || cantidad == "") ? 0: cantidad;
        return cantidad;
    }

    function getCosto2() {
        var cantidad = document.getElementById("id_producto2").value; 
        cantidad = (cantidad == null || cantidad == undefined || cantidad == "") ? 0: cantidad;
        var inicio = cantidad.indexOf(',');
        cantidad = cantidad.substring(inicio +1, cantidad.length);
        cantidad = parseInt(cantidad);
        return cantidad;
    }


    function multiplicar2() {
    //console.log("cantidad = " + getCantidad2());
    //console.log("Costo = " + getCosto2());
    var total = 0;	
    total = document.getElementById('monto_total2').innerHTML;
	
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
	
    /* Esta es la multiplicacion. */
    total = ( getCosto2() * getCantidad2());
	
    // Colocar el resultado en monto_total.
    document.getElementById('monto_total2').innerHTML = total;
    document.getElementById("monto_total2").value = total;
    }
</script>