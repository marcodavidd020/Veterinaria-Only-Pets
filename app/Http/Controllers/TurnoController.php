<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:turnos.index')->only('index');
        $this->middleware('can:turnos.create')->only('create', 'store');
        $this->middleware('can:turnos.edit')->only('edit', 'update', 'datas');
    }
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $turnos = Turno::where('horario_entrada', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('horario_salida', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate(7);
        $data = [
            'turnos' => $turnos,
            'busqueda' => $busqueda,
        ];
        return view('turnos.index', compact('turnos'));
    }

    public function store(Request $request)
    {
        Turno::create([
            'horario_entrada' => $request->horario_entrada,
            'horario_salida' => $request->horario_salida,
        ]);
        return redirect(route('turnos.index'));
    }

    public function datas($id)
    {
        $turno = Turno::find($id);
        return $turno;
    }


    public function update(Request $request, $id)
    {
        $turno = Turno::find($id);
        $data = [
            'horario_entrada' => $request->horario_entrada,
            'horario_salida' => $request->horario_salida,
        ];
        $turno->update($data);
        return redirect(route('turnos.index'));
    }

    public function destroy($id)
    {
        $turno = Turno::findOrFail($id);
        $turno->delete();

        return redirect()->route('turnos.index');
    }
}
