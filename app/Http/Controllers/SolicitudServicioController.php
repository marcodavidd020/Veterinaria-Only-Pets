<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\Recibo;
use App\Models\Servicio;
use App\Models\SolicitudServicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class SolicitudServicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:cita-servicio.index')->only('index');
        $this->middleware('can:cita-servicio.create')->only('create', 'store');
    }


    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $solicitudes = SolicitudServicio::where('id_cliente', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('id_servicio', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('id_recibo', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate(7);
        $data = [
            'solicitudes' => $solicitudes,
            'busqueda' => $busqueda,
        ];
        $solicitudes->load('cliente');
        $solicitudes->load('servicio');
        $solicitudes->load('recibo');
        $solicitudes->load('mascota');

        return view('solicitudes.index', compact('solicitudes'));
    }

    public function store(Request $request)
    {
        //NOTA: esta accion solo la puede realizar el administrativo
        //Auth::user()->id  es el id de la persona que esta 
        //registrando la solicitud de servicio
        $fecha = Carbon::now();
        $recibo = Recibo::create([
            'fecha' => $fecha->toDateString(),
            'concepto' => $request->concepto,
            'monto_cancelado' => $request->monto_cancelado,
            'saldo' => $request->saldo,
            'monto_total' => $request->monto_total,
            'id_administrativo' => Auth::user()->id,
        ]);
        if (is_null($request->servicios)) {
            SolicitudServicio::create([
                'id_cliente' => $request->id_cliente,
                'id_servicio' => null,
                'id_recibo' => $recibo->id,
                'id_mascota' => $request->id_mascota,
            ]);
        } else {
            foreach ($request->servicios as $servicio) {
                SolicitudServicio::create([
                    'id_cliente' => $request->id_cliente,
                    'id_servicio' => $servicio,
                    'id_recibo' => $recibo->id,
                    'id_mascota' => $request->id_mascota,
                ]);
            }
        }

        $cliente = Cliente::findOrFail($request->id_cliente)->load('persona')->persona;
        $mascota = Mascota::findOrFail($request->id_mascota);
        $servicios = Servicio::whereIn('id', $request->servicios)->get()->map(function ($servicio) {
            return $servicio->nombre;
        });
        BitacoraController::registrar(
            Auth::user()->id,
            'Solicitud de servicio',
            'El cliente ' . $cliente->nombre . ' ' . $cliente->apellido_paterno . ' ' . $cliente->apellido_materno .
                ' solicitó el/los servicios: ' . implode('-', $servicios->toArray()) . ' para la mascota ' . $mascota->nombre
        );
        return redirect(route('solicitudes.index'));
    }

    public function show($id)
    {
        $solicitud = SolicitudServicio::findOrFail($id);
        return view('solicitudes.show', compact('solicitud'));
    }

    public function pdf($id)
    {
        $solicitud = SolicitudServicio::findOrFail($id);

        $pdf = PDF::loadView('solicitudes.pdf',['solicitud'=>$solicitud]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->download('recibo.pdf');
        //return view('solicitudes.pdf',compact('solicitud'));
    }
}
