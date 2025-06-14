<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('1234');

        Usuario::create([
            'nombre_usuario' => 'torrez-juan@gmail.com', 
            'password' => $password, 
            'enable' => '1',
            'id_persona' => '1', 
        ])->assignRole('super-admin');

        Usuario::create([
            'nombre_usuario' => 'maria', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '2', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'sofia', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '3', 
        ])->assignRole('recepcionista');

        Usuario::create([
            'nombre_usuario' => 'gonzales', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '4', 
        ])->assignRole('recepcionista');

        Usuario::create([
            'nombre_usuario' => 'josue', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '5', 
        ])->assignRole('recepcionista');

        Usuario::create([
            'nombre_usuario' => 'andresF', 
            'password' => $password, 
            'enable' => '1',  
            'id_persona' => '6', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'luci', 
            'password' => $password, 
            'enable' => '1',  
            'id_persona' => '7', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'molina', 
            'password' => $password, 
            'enable' => '1',  
            'id_persona' => '8', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'luis', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '9', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'enrique', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '10', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'santiago EB', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '11', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'guzman pedraza', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '12', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'marcelo', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '13', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'felipe', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '14', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'angela', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '15', 
        ])->assignRole('veterinario');
    }
}
