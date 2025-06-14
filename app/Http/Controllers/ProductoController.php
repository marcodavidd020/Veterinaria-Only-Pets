<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\StoreVentaRequest;
use App\Models\DetalleVenta;
use App\Models\NotaIngreso;
use App\Models\Producto;
use App\Models\Recibo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:productos.index')->only('index', 'show');
        $this->middleware('can:productos.create')->only('create', 'store');
        $this->middleware('can:productos.edit')->only('edit', 'update','datas');
        $this->middleware('can:productos.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $productos = Producto::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('precio', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('marca', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('costo', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'servicio' => $productos,
            'busqueda' => $busqueda,
        ];
        return view('productos.index', compact('productos'));
    }

    public function store(Request $request) 
    {
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'costo' => $request->costo,
            'precio' => $request->precio,
            'marca' => $request->marca,
            'cantidad' => 0,
            'foto' => $request->foto,
        ]);
        return redirect(route('productos.index'));
    }

    public function datas($id){
        $producto = Producto::find($id);
        return $producto;
    }

    public function update(Request $request, $id) {
        $producto = producto::find($id);
        $data = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'marca' => $request->marca,
            'costo' => $request->costo,
            'precio' => $request->precio,
            'id_categoria' => $request->id_categoria,
            'foto' => $request->foto,
        ];
        $producto->update($data);
        return redirect(route('productos.index'));
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function comprar(StoreCompraRequest $request) 
    {
        $fin = strpos($request->id_producto, ',');
        $id_producto = substr($request->id_producto, 0, $fin);
        NotaIngreso::create([
            'id_proveedor' => $request->id_proveedor,
            'id_administrativo' => @Auth::user()->id,
            'id_producto' => $id_producto,
            'monto_total' => $request->monto_total,
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => $request->cantidad
        ]);
        //Actualizando el stock del producto
        $producto = Producto::find($id_producto);
        $producto->cantidad = $producto->cantidad + $request->cantidad;
        $producto->save();

        return redirect(route('productos.index'));
    }

    public function vender(StoreVentaRequest $request) 
    {
        $fin = strpos($request->id_producto, ',');
        $id_producto = substr($request->id_producto, 0, $fin);
        $producto =  Producto::find($id_producto);
        $stock = $producto->cantidad - $request->cantidad;
        if ($stock < 0) {
            //echo "<script>alert('Stock insuficiente del producto');</script>";
            return redirect()->route('productos.index')
            ->withErrors('Error', 'Stock insuficiente del producto');
        }
        //Actualizacion del stock del producto
        $producto->cantidad = $stock;
        $producto->save();

        //@Auth::user()->id es el id del administrativo
        $recibo = Recibo::create([
            'fecha' => date('Y-m-d'),
            'saldo' => 0,
            'id_administrativo' => @Auth::user()->id,
            'monto_cancelado' => $request->monto_total,
            'monto_total' => $request->monto_total,
            'concepto' => $request->concepto,
        ]);
        DetalleVenta::create([
            'id_recibo' => $recibo->id,
            'precio_total' => $request->monto_total,
            'cantidad' => $request->cantidad,
            'id_producto' => $id_producto,
        ]);
        return redirect(route('productos.index'));
    }

}
