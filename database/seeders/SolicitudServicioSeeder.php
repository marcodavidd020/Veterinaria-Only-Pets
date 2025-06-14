<?php

namespace Database\Seeders;

use App\Models\SolicitudServicio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //para cirugias
        SolicitudServicio::create([
            'id_cliente' => '8', 
            'id_servicio' => '5', 
            'id_recibo' => '1', 
            'id_mascota' => '1',
        ]);
        SolicitudServicio::create([
            'id_cliente' => '8', 
            'id_servicio' => '5', 
            'id_recibo' => '2', 
            'id_mascota' => '1',
        ]);
        SolicitudServicio::create([
            'id_cliente' => '8', 
            'id_servicio' => '5', 
            'id_recibo' => '3', 
            'id_mascota' => '1',
        ]);

        SolicitudServicio::create([
            'id_cliente' => '8', 
            'id_servicio' => '5', 
            'id_recibo' => '4', 
            'id_mascota' => '2',
        ]);
        SolicitudServicio::create([
            'id_cliente' => '8', 
            'id_servicio' => null, 
            'id_recibo' => '5', 
            'id_mascota' => '2',
        ]);
        SolicitudServicio::create([
            'id_cliente' => '8', 
            'id_servicio' => null, 
            'id_recibo' => '6', 
            'id_mascota' => '2',
        ]);
        SolicitudServicio::create([
            'id_cliente' => '8', 
            'id_servicio' => null, 
            'id_recibo' => '7', 
            'id_mascota' => '2',
        ]);


        //para vacunas
        SolicitudServicio::create([
            'id_cliente' => '9', 
            'id_servicio' => '1', 
            'id_recibo' => '8', 
            'id_mascota' => '3',
        ]);
        SolicitudServicio::create([
            'id_cliente' => '9', 
            'id_servicio' => '1', 
            'id_recibo' => '9', 
            'id_mascota' => '3',
        ]);


        SolicitudServicio::create([
            'id_cliente' => '10', 
            'id_servicio' => '1', 
            'id_recibo' => '10', 
            'id_mascota' => '4',
        ]);
        SolicitudServicio::create([
            'id_cliente' => '10', 
            'id_servicio' => '1', 
            'id_recibo' => '11', 
            'id_mascota' => '4',
        ]);


        SolicitudServicio::create([
            'id_cliente' => '11', 
            'id_servicio' => '1', 
            'id_recibo' => '12', 
            'id_mascota' => '5',
        ]);

        
        //para productos
        SolicitudServicio::create([
            'id_cliente' => '8', 
            'id_servicio' => null, 
            'id_recibo' => '13', 
            'id_mascota' => '1',
        ]);
        SolicitudServicio::create([
            'id_cliente' => '9', 
            'id_servicio' => null, 
            'id_recibo' => '14', 
            'id_mascota' => '1',
        ]);

        SolicitudServicio::create([
            'id_cliente' => '10', 
            'id_servicio' => null, 
            'id_recibo' => '15', 
            'id_mascota' => '4',
        ]);
        SolicitudServicio::create([
            'id_cliente' => '10', 
            'id_servicio' => null, 
            'id_recibo' => '16', 
            'id_mascota' => '4',
        ]);


    }
}
