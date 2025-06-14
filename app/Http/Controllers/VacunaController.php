<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use App\Http\Requests\StorevacunasRequest;
use App\Actions\VacunaAction;
use Illuminate\Support\Facades\Auth;

class VacunaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:vacunas.index')->only('index');
        $this->middleware('can:vacunas.create')->only('create', 'store');
        $this->middleware('can:vacunas.edit')->only('edit', 'update');
    }

    public function index()
    {
        $vacunas = Vacuna::get();
        return view('vacunas.index', compact('vacunas'));
    }

    public function create()
    {
        return view('vacunas.create');
    }

    public function store(StorevacunasRequest $request)
    {

        VacunaAction::executeStore($request);

        BitacoraController::registrar(
            Auth::user()->id,
            'Creación de vacuna',
            'Se creó la vacuna: ' . $request->nombre
        );
        return redirect()->route('vacunas.index');
    }

    public function destroy($id)
    {
        $vacuna = Vacuna::findOrFail($id);
        $vacuna->delete();

        return redirect()->route('vacunas.index');
    }
}
