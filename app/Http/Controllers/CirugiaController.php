<?php

namespace App\Http\Controllers;

use App\Models\Cirugia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CirugiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:cirugias.index')->only('index');
        $this->middleware('can:cirugias.create')->only('create', 'store');
        $this->middleware('can:cirugias.edit')->only('edit', 'update');
    }


    public function index()
    {
        $cirugias = Cirugia::get();
        return view('cirugias.index', compact('cirugias'));
    }

    public function store(Request $request)
    {
        Cirugia::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo
        ]);
        BitacoraController::registrar(
            Auth::user()->id,
            'Creación de cirugía',
            'Se creó la cirugia: ' . $request->nombre . ' de tipo: ' . $request->tipo
        );
        return redirect(route('cirugias.index'));
    }

    public function datas($id)
    {
        $cirugia = Cirugia::find($id);
        return $cirugia;
    }

    public function update(Request $request, $id)
    {
        $cirugia = Cirugia::findOrFail($id);
        $data = ([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
        ]);
        $cirugia->update($data);
        BitacoraController::registrar(
            Auth::user()->id,
            'Edición de cirugía',
            'Se editó la cirugía: ' . $request->nombre . ' de tipo: ' . $request->tipo
        );
        return redirect()->route('cirugias.index');
    }

    public function destroy($id)
    {
        $cirugia = Cirugia::findOrFail($id);
        $cirugia->delete();

        return redirect()->route('cirugias.index');
    }
}
