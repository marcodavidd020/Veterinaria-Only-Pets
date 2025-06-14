<?php

namespace Database\Seeders;

use App\Models\DetalleVacuna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleVacunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleVacuna::create([
            'id_vacuna' => '2', 
            'id_historial' => '3', 
            'dosis' => '1', 
            'fecha_aplicacion' => '2022-03-10', 
            'fecha_prox_aplicacion' => null, 
        ]);//moquillo
        DetalleVacuna::create([
            'id_vacuna' => '4', 
            'id_historial' => '3', 
            'dosis' => '1', 
            'fecha_aplicacion' => '2022-03-20', 
            'fecha_prox_aplicacion' => null, 
        ]);//rabia

        
        DetalleVacuna::create([
            'id_vacuna' => '4', 
            'id_historial' => '4', 
            'dosis' => '1', 
            'fecha_aplicacion' => '2022-03-10', 
            'fecha_prox_aplicacion' => null, 
        ]);//rabia
        DetalleVacuna::create([
            'id_vacuna' => '1', 
            'id_historial' => '4', 
            'dosis' => '1', 
            'fecha_aplicacion' => '2022-03-30', 
            'fecha_prox_aplicacion' => null, 
        ]);//Parvovirus

        DetalleVacuna::create([
            'id_vacuna' => '6', 
            'id_historial' => '5', 
            'dosis' => '1', 
            'fecha_aplicacion' => '2022-03-10', 
            'fecha_prox_aplicacion' => null, 
        ]);//Leptospirosis
    }
}
