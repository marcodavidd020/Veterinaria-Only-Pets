<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:proveedores.index')->only('index', 'show');
        $this->middleware('can:proveedores.create')->only('create', 'store');
        $this->middleware('can:proveedores.edit')->only('edit', 'update','datas');
        $this->middleware('can:proveedores.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $proveedores = Proveedor::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('email', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('NIT', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('telefono', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'servicio' => $proveedores,
            'busqueda' => $busqueda,
        ];
        return view('proveedores.index', compact('proveedores'));
    }

    public function store(StoreProveedorRequest $request) 
    {
        Proveedor::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'NIT' => $request->NIT,
        ]);
        return redirect(route('proveedores.index'));
    }

    public function datas($id){
        $proveedor = Proveedor::find($id);
        return $proveedor;
    }

    public function update(UpdateProveedorRequest $request, $id) {
        $proveedor = Proveedor::find($id);
        $data = [
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'NIT' => $request->NIT,
        ];
        $proveedor->update($data);
        return redirect(route('proveedores.index'));
    }

    public function show(Proveedor $proveedore)
    {
        return view('proveedores.show', compact('proveedore'));
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedores.index');
    }

}
