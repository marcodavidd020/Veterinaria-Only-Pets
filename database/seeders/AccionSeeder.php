<?php

namespace Database\Seeders;

use App\Models\Accion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar medico veterinario', 
            'fecha' => '2022-04-24', 
            'hora' => '9:21', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar medico veterinario', 
            'fecha' => '2022-04-24', 
            'hora' => '9:24', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar medico veterinario', 
            'fecha' => '2022-04-24', 
            'hora' => '9:30', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar medico veterinario', 
            'fecha' => '2022-04-25', 
            'hora' => '10:11', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar medico veterinario', 
            'fecha' => '2022-04-25', 
            'hora' => '11:01', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar medico veterinario', 
            'fecha' => '2022-04-25', 
            'hora' => '12:52', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Modificar', 
            'descripcion' => 'Modificar medico veterinario', 
            'fecha' => '2022-04-24', 
            'hora' => '9:31', 
            'id_bitacora' => '3', 
        ]);
        Accion::create([
            'accion' => 'Modificar', 
            'descripcion' => 'Modificar medico veterinario', 
            'fecha' => '2022-04-24', 
            'hora' => '13:52', 
            'id_bitacora' => '3', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar administrativo', 
            'fecha' => '2022-04-24', 
            'hora' => '13:59', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar administrativo', 
            'fecha' => '2022-04-24', 
            'hora' => '14:29', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar administrativo', 
            'fecha' => '2022-04-24', 
            'hora' => '14:39', 
            'id_bitacora' => '1', 
        ]);

        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar cliente', 
            'fecha' => '2022-04-24', 
            'hora' => '15:10', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar cliente', 
            'fecha' => '2022-04-24', 
            'hora' => '15:20', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar cliente', 
            'fecha' => '2022-04-24', 
            'hora' => '16:20', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar cliente', 
            'fecha' => '2022-04-24', 
            'hora' => '16:28', 
            'id_bitacora' => '1', 
        ]);
        Accion::create([
            'accion' => 'Registrar', 
            'descripcion' => 'Registrar cliente', 
            'fecha' => '2022-04-24', 
            'hora' => '18:11', 
            'id_bitacora' => '1', 
        ]);

    }
}
