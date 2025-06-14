<?php

namespace App\Http\Controllers;

use App\Model\Servicio;
use App\Models\Bitacora;
use App\Models\PlanDePago;
use App\Models\Servicio as ModelsServicio;
use App\Models\SolicitudServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:servicios.index')->only('index', 'show');
        $this->middleware('can:servicios.create')->only('create', 'store');
        $this->middleware('can:servicios.edit')->only('edit', 'update','datas');
        $this->middleware('can:servicios.destroy')->only('destroy');
    }
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $servicios = ModelsServicio::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('precio', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'servicio' => $servicios,
            'busqueda' => $busqueda,
        ];
        $servicios->load('plan_de_pagos');
        return view('servicios.index', compact('servicios'));
    }

    public function show(ModelsServicio $servicio)
    {
        return view('servicios.show', compact('servicio'));
    }

    public function store(Request $request)
    {
        $servicio = ModelsServicio::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio
        ]);

        PlanDePago::create([
            'nro_cuotas' => $request->nro_cuotas,
            'monto_cuota' => $request->monto_cuota,
            'id_servicio' => $servicio->id,
        ]);

        BitacoraController::registrar(
            Auth::user()->id,
            'Creación de servicio',
            'Se creó el servicio: '.$request->nombre. ' con precio: '.$request->precio
        );


        return redirect(route('servicios.index'));
    }

    public function datas($id)
    {
        $servicio = ModelsServicio::find($id);
        $servicio->load('plan_de_pagos');
        return $servicio;
    }

    public function update(Request $request, $id)
    {
        $servicio = ModelsServicio::findOrFail($id);
        $data = ([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);
        $servicio->update($data);
        BitacoraController::registrar(
            Auth::user()->id,
            'Edición de servicio',
            'Se editó el servicio: '.$request->nombre. ' con precio: '.$request->precio
        );
        return redirect()->route('servicios.index');
    }
}
