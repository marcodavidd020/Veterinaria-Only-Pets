<?php

namespace App\Http\Controllers;

use App\Models\HistorialClinico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HistorialClinicoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:historiales.index')->only('index');
        $this->middleware('can:historiales.create')->only('store');
        $this->middleware('can:historiales.edit')->only('edit', 'update');
    }


    public function index()
    {
        $historiales = HistorialClinico::get();
        return view('historiales.index', compact('historiales'));
    }

    public function show(HistorialClinico $historiale)
    {
        /* $historiale->load('vacuna');
        return $historiale; */
        return view('historiales.show', compact('historiale'));
    }

    public function store(Request $request)
    {
        /* Vacuna::create([
            'nombre' => $request->nombre,
        ]); */
        return redirect(route('vacunas.index'));
    }

    /* public function datas($id){
        $vacuna = Vacuna::find($id);
        return $vacuna;
    } */

    /* public function update(Request $request, $id) {
        $vacuna = Vacuna::findOrFail($id);
        $data = ([
            'nombre' => $request->nombre,
        ]);
        $vacuna->update($data);
        return redirect()->route('vacunas.index');
    } */

    public function pdf($id)
    {
        $historiale = HistorialClinico::findOrFail($id);
        $pdf = PDF::loadView('historiales.pdf', ['historiale' => $historiale]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->download('historial.pdf');
        //return view('historiales.pdf',compact('historiale'));
    }
}
