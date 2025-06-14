<?php

namespace App\Actions;

use App\Models\Accion;
use App\Models\Bitacora;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Usuario;

class StoreUsuarioAction 
{
    //use DispatchesJobs;

    public static function execute(Request $request): void
    {
        $persona = Persona::create([
            'nombre'           => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email'            => $request->email,
        ]);
        Cliente::create(['id' => $persona->id]);
        $usuario = Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'password'       => bcrypt($request->password),
            'enable'         => '1',
            'id_rol'         => '4',
            'id_persona'     => $persona->id,
        ]);    
        $bitacora = Bitacora::create([
            'id_usuario' => $usuario->id,
            'descripción' => 'Bitacora de usuario '.$usuario->id,
        ]);

        Accion::created([
            'accion' => 'Creación de usuario',
            'descripcion' => 'Se creó este usuario',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'id_bitacora' => $bitacora->id,
        ]);

    }

}