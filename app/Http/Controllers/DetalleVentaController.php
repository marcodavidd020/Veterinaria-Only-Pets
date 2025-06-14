<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DetalleVentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:ventas.index')->only('index', 'show');
        $this->middleware('can:ventas.create')->only('create', 'store');
        $this->middleware('can:ventas.edit')->only('edit', 'update', 'datas');
        $this->middleware('can:ventas.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $ventas = DetalleVenta::where('id', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('cantidad', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('precio_total', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'venta' => $ventas,
            'busqueda' => $busqueda,
        ];
        return view('ventas.index', compact('ventas'));
    }

    public function pdf($id)
    {
        $venta = DetalleVenta::findOrFail($id);
        $pdf = PDF::loadView('ventas.pdf', ['venta' => $venta]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->download('ventas.pdf');
        //return view('historiales.pdf',compact('historiale'));
    }
}
