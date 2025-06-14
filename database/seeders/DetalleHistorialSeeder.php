<?php

namespace Database\Seeders;

use App\Models\DetalleHistorial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleHistorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Los de cirugia
        DetalleHistorial::create([
            'descripcion' => 'Deteccion de cancer', 
            'fecha_consulta' => '2022-03-15', 
            'fecha_prox_consulta' => '2022-04-10', 
            'id_historial' => '1', 
        ]);
        DetalleHistorial::create([
            'descripcion' => '1er tratamiento de cancer', 
            'fecha_consulta' => '2022-04-10', 
            'fecha_prox_consulta' => '2022-04-30', 
            'id_historial' => '1', 
        ]);
        DetalleHistorial::create([
            'descripcion' => 'Ultimo tratamiento de cancer', 
            'fecha_consulta' => '2022-04-30', 
            'fecha_prox_consulta' => null, 
            'id_historial' => '1', 
        ]);

        DetalleHistorial::create([
            'descripcion' => 'Realizacion de cirugia gastrointestinal', 
            'fecha_consulta' => '2022-03-10', 
            'fecha_prox_consulta' => null, 
            'id_historial' => '2', 
        ]);


        //Los de vacunas
        DetalleHistorial::create([
            'descripcion' => 'Deteccion y vacunacion de moquillo', 
            'fecha_consulta' => '2022-03-10', 
            'fecha_prox_consulta' => null, 
            'id_historial' => '3', 
        ]);
        DetalleHistorial::create([
            'descripcion' => 'Deteccion y vacunacion de rabia', 
            'fecha_consulta' => '2022-03-20', 
            'fecha_prox_consulta' => null, 
            'id_historial' => '3', 
        ]);

        DetalleHistorial::create([
            'descripcion' => 'Deteccion y vacunacion de rabia', 
            'fecha_consulta' => '2022-03-20', 
            'fecha_prox_consulta' => null, 
            'id_historial' => '4', 
        ]);
        DetalleHistorial::create([
            'descripcion' => 'Deteccion y vacunacion de parvovirus', 
            'fecha_consulta' => '2022-03-30', 
            'fecha_prox_consulta' => null, 
            'id_historial' => '4', 
        ]);


        DetalleHistorial::create([
            'descripcion' => 'Deteccion y vacunacion de leptospirosis', 
            'fecha_consulta' => '2022-03-10', 
            'fecha_prox_consulta' => null, 
            'id_historial' => '5', 
        ]);
        
    }
}
