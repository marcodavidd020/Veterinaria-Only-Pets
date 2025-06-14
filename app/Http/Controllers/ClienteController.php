<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Telefono;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:clientes.index')->only('index', 'show');
        $this->middleware('can:clientes.create')->only('create', 'store', 'datas');
        $this->middleware('can:clientes.edit')->only('edit', 'update');
        
    }


    public function index(){
        $clientes=Persona::join('clientes','clientes.id','=','personas.id')->get();

        return view('clientes.index',compact('clientes'));
    }

    //store cliente
    public function store(StoreClienteRequest $request){
        $persona=Persona::create([
            'nombre'=>$request->nombre,
            'apellido_paterno'=>$request->apellido_paterno,
            'apellido_materno'=>$request->apellido_materno,
            'email'=>$request->email,
            'direccion'=>$request->direccion,
            'fecha_de_nacimiento'=>$request->fecha_de_nacimiento,
            'sexo'=>$request->sexo,
            'ci'=>$request->ci,
        ]);
        
        foreach ($request->telefonos as $telefono) {
            Telefono::create([
                'numero' => $telefono,
                'id_persona' => $persona->id,
            ]);
        }

        Cliente::create([
            'id'=>$persona->id,
        ]);

        //create Usuario
        Usuario::create([
            'nombre_usuario'=>$request->email,
            'password'=>bcrypt($request->ci),
            'enable'=>'1',
            'id_persona'     => $persona->id,
        ])->assignRole('cliente');

        BitacoraController::registrar(
            Auth::user()->id,
            'Creación de cliente',
            'Se creó el cliente: ' . $request->nombre . ' ' . $request->apellido_paterno . ' ' . $request->apellido_materno
        );

        return redirect()->route('clientes.index');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'string|required|max:20|min:3',
            'apellido_paterno' => 'string|required|max:20|min:3',
            'apellido_materno' => 'string|required|max:20|min:3',
            'email' => 'email|max:40'
        ]);

        $persona = Persona::findOrFail($id);
        $cliente = Cliente::findOrFail($id);

        $persona->load('telefonos');

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


        $persona->update($data);
        $cliente->update();


        BitacoraController::registrar(
            Auth::user()->id,
            'Edición de cliente',
            'Se editó el cliente: ' . $request->nombre . ' ' . $request->apellido_paterno . ' ' . $request->apellido_materno
        );
        return redirect()->route('clientes.index');


    }

    public function datas($id)
    {
        $cliente = Cliente::find($id);
        $cliente->load('persona');
        $cliente->persona->load('telefonos');
        return $cliente;
    }

    public function show(Cliente $cliente) {
        $telefonos = Telefono::whereid_persona($cliente->id)->get();
        return view('clientes.show', compact('cliente', 'telefonos'));
    }
}
