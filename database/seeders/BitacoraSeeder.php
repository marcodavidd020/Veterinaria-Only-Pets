<?php

namespace Database\Seeders;

use App\Models\Bitacora;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BitacoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 1', 
            'id_usuario' => '1', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 2', 
            'id_usuario' => '2', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 3', 
            'id_usuario' => '3', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 4', 
            'id_usuario' => '4', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 5', 
            'id_usuario' => '5', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 6', 
            'id_usuario' => '6', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 7', 
            'id_usuario' => '7', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 8', 
            'id_usuario' => '8', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 9', 
            'id_usuario' => '9', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 10', 
            'id_usuario' => '10', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 11', 
            'id_usuario' => '11', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 12', 
            'id_usuario' => '12', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 13', 
            'id_usuario' => '13', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 14', 
            'id_usuario' => '14', 
        ]);
        Bitacora::create([
            'descripcion' => 'Bitacora de usuario 15', 
            'id_usuario' => '15', 
        ]);
    }
}
