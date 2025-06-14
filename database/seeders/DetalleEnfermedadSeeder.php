<?php

namespace Database\Seeders;

use App\Models\DetalleEnfermedad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleEnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //para los de cirugia 
        DetalleEnfermedad::create([
            'id_enfermedad' => '18', 
            'id_historial' => '1', 
            'fecha_deteccion' => '2022-03-15', 
            'inicio_tratamiento' => '2022-03-15', 
            'fin_tratamiento' => null, 
        ]);
        DetalleEnfermedad::create([
            'id_enfermedad' => '18', 
            'id_historial' => '1', 
            'fecha_deteccion' => '2022-03-15', 
            'inicio_tratamiento' => '2022-03-15', 
            'fin_tratamiento' => null, 
        ]);
        DetalleEnfermedad::create([
            'id_enfermedad' => '18', 
            'id_historial' => '1', 
            'fecha_deteccion' => '2022-03-15', 
            'inicio_tratamiento' => '2022-03-15', 
            'fin_tratamiento' => null, 
        ]);
        DetalleEnfermedad::create([
            'id_enfermedad' => '18', 
            'id_historial' => '1', 
            'fecha_deteccion' => '2022-03-15', 
            'inicio_tratamiento' => '2022-03-15', 
            'fin_tratamiento' => '2022-04-30', 
        ]);

        DetalleEnfermedad::create([
            'id_enfermedad' => '13', 
            'id_historial' => '2', 
            'fecha_deteccion' => '2022-03-15', 
            'inicio_tratamiento' => '2022-03-15', 
            'fin_tratamiento' => '2022-03-30', 
        ]);

        
        //para los de vacunas
        DetalleEnfermedad::create([
            'id_enfermedad' => '3', 
            'id_historial' => '3', 
            'fecha_deteccion' => '2022-03-10', 
            'inicio_tratamiento' => '2022-03-10', 
            'fin_tratamiento' => '2022-03-10', 
        ]);//moquillo
        DetalleEnfermedad::create([
            'id_enfermedad' => '1', 
            'id_historial' => '3', 
            'fecha_deteccion' => '2022-03-20', 
            'inicio_tratamiento' => '2022-03-20', 
            'fin_tratamiento' => '2022-03-20', 
        ]);//rabia

        DetalleEnfermedad::create([
            'id_enfermedad' => '1', 
            'id_historial' => '4', 
            'fecha_deteccion' => '2022-03-20', 
            'inicio_tratamiento' => '2022-03-20', 
            'fin_tratamiento' => '2022-03-20', 
        ]);
        DetalleEnfermedad::create([
            'id_enfermedad' => '5', 
            'id_historial' => '4', 
            'fecha_deteccion' => '2022-03-30', 
            'inicio_tratamiento' => '2022-03-30', 
            'fin_tratamiento' => '2022-03-30', 
        ]);


        DetalleEnfermedad::create([
            'id_enfermedad' => '4', 
            'id_historial' => '5', 
            'fecha_deteccion' => '2022-03-10', 
            'inicio_tratamiento' => '2022-03-10', 
            'fin_tratamiento' => '2022-03-10', 
        ]);

    }
}
