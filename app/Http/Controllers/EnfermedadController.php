<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Enfermedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnfermedadController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:enfermedades.index')->only('index');
        $this->middleware('can:enfermedades.create')->only('create', 'store');
        $this->middleware('can:enfermedades.edit')->only('edit', 'update');
    }

    public function index(Request $request)
    {
        $enfermedades = Enfermedad::get();
        $busqueda = $request->busqueda;
        $enfermedades = Enfermedad::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('id', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'enfermedad' => $enfermedades,
            'busqueda' => $busqueda,
        ];
        return view('enfermedades.index', compact('enfermedades'));
    }

    public function show($id)
    {
        //return view('enfermedades.show', compact('enfermedad'));
        $enfermedad = Enfermedad::findOrFail($id);
        return view('enfermedades.show', compact('enfermedad'));
    }

    public function store(Request $request)
    {
        Enfermedad::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo
        ]);
        BitacoraController::registrar(
            Auth::user()->id,
            'Creación de enfermedad',
            'Se creó la enfermedad: ' . $request->nombre . ' de tipo: ' . $request->tipo
        );
        return redirect(route('enfermedades.index'));
    }

    public function datas($id)
    {
        $enfermedad = Enfermedad::find($id);
        return $enfermedad;
    }

    public function update(Request $request, $id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        $data = ([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
        ]);
        $enfermedad->update($data);
        BitacoraController::registrar(
            Auth::user()->id,
            'Edición de enfermedad',
            'Se editó la enfermedad: ' . $request->nombre . ' de tipo: ' . $request->tipo
        );
        return redirect()->route('enfermedades.index');
    }

    public function destroy($id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        $enfermedad->delete();

        return redirect()->route('enfermedades.index');
    }
}
