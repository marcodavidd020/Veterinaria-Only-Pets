<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVeterinarioRequest;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Telefono;
use App\Models\TurnoVet;
use App\Models\Usuario;
use App\Models\Veterinario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VeterinarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:veterinarios.index')->only('index', 'show');
        $this->middleware('can:veterinarios.create')->only('create', 'store', 'datas');
        $this->middleware('can:veterinarios.edit')->only('edit', 'update');
    }

    public function index()
    {
        $veterinarios = Veterinario::get();
        $veterinarios->load('persona');
        return view('veterinarios.index', compact('veterinarios'));
    }

    public function store(StoreVeterinarioRequest $request)
    {

        $persona = Persona::create([
            'nombre'           => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email'            => $request->email,
            'direccion'        => $request->direccion,
            'fecha_de_nacimiento' => $request->fecha_de_nacimiento,
            'sexo'             => $request->sexo,
            'ci'               => $request->ci,
        ]);

        foreach ($request->telefonos as $telefono) {
            Telefono::create([
                'numero' => $telefono,
                'id_persona' => $persona->id,
            ]);
        }

        Veterinario::create([
            'id'        => $persona->id,
            'profesion' => $request->profesion,
            'id_servicio' => $request->servicio,
        ]);


        if ($request->turno) {
            TurnoVet::create([
                'id_veterinario' => $persona->id,
                'id_turno' => $request->turno,
            ]);
        }

        $user = Usuario::create([
            'nombre_usuario' => $request->email,
            'password'       => bcrypt($request->ci),
            'enable'         => '1',
            'id_persona'     => $persona->id,
        ])->assignRole('veterinario');

        Bitacora::create([
            'descripcion' => 'bitacora',
            'id_usuario' => $user->id,
        ]);

        BitacoraController::registrar(
            Auth::user()->id,
            'Creación de veterinario',
            'Se creó el veterinario: ' . $request->nombre . ' ' . $request->apellido_paterno . ' ' . $request->apellido_materno
        );
        return redirect()->route('veterinarios.index');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'string|required|max:20|min:3',
            'apellido_paterno' => 'string|required|max:20|min:3',
            'apellido_materno' => 'string|required|max:20|min:3',
            'email' => 'email|max:40',
            'profesion' => 'string|required|min:7'
        ]);
        $persona = Persona::findOrFail($id);
        $veterinario = Veterinario::findOrFail($id);
        $veterinario->load('turno');
        $persona->load('telefonos');

        $veterinario->profesion = $request->profesion;
        $veterinario->id_servicio = $request->servicio;
        $data = ([
            'nombre'              => $request->nombre,
            'apellido_paterno'    => $request->apellido_paterno,
            'apellido_materno'    => $request->apellido_materno,
            'email'               => $request->email,
            'ci'                  => $request->ci,
            'direccion'           => $request->direccion,
            'fecha_de_nacimiento' => $request->fecha_de_nacimiento,
            'sexo'                => $request->sexo,
        ]);

        //ACTUALIZANDO TELEFONOS
        $telefonos_nuevos = $request->telefonos;
        foreach ($persona->telefonos as $telefono) {
            if (!in_array($telefono->numero, $request->telefonos)) {
                $telefono->delete();
            } else {
                unset($telefonos_nuevos[array_search($telefono->numero, $request->telefonos)]);
            }
        }
        foreach ($telefonos_nuevos as $numero) {
            Telefono::create([
                'numero' => $numero,
                'id_persona' => $persona->id,
            ]);
        }

        //ACTUALIzANDO TURNOS
        if ($request->turno!="Ninguno") {
            if (isset($veterinario->turno[0])) {
                $veterinario->turno[0]->id_turno = $request->turno;
                $veterinario->turno[0]->save();
            } else {
                TurnoVet::create([
                    'id_veterinario' => $persona->id,
                    'id_turno' => $request->turno,
                ]);
            }
        } else {
            if (!empty($veterinario->turno)) {
                $id_V = $veterinario->turno[0]->id_veterinario;
                $id_T = $veterinario->turno[0]->id_turno;
                TurnoVet::where('id_veterinario', $id_V)->where('id_turno', $id_T)->delete();
            }
        }


        $persona->update($data);
        $veterinario->update();
        BitacoraController::registrar(
            Auth::user()->id,
            'Edición de veterinario',
            'Se editó los datos del veterinario: ' . $request->nombre . ' ' . $request->apellido_paterno . ' ' . $request->apellido_materno
        );
        return redirect()->route('veterinarios.index');
    }


    public function datas($id)
    {
        $veterinario = Veterinario::find($id);
        $veterinario->load('turno');
        $veterinario->load('persona');
        $veterinario->persona->load('telefonos');
        return $veterinario;
    }
    
    public function show(Veterinario $veterinario) {
        $telefonos = Telefono::whereid_persona($veterinario->id)->get();
        return view('veterinarios.show', compact('veterinario', 'telefonos'));

    }
}
