<?php

namespace Database\Seeders;

use App\Models\clienteMascota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteMascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        clienteMascota::create([
            'id_cliente' => '8', 
            'id_mascota' => '1', 
        ]);
        clienteMascota::create([
            'id_cliente' => '8', 
            'id_mascota' => '2', 
        ]);
        clienteMascota::create([
            'id_cliente' => '9', 
            'id_mascota' => '3', 
        ]);
        clienteMascota::create([
            'id_cliente' => '10', 
            'id_mascota' => '4', 
        ]);
        clienteMascota::create([
            'id_cliente' => '11', 
            'id_mascota' => '5', 
        ]);
        clienteMascota::create([
            'id_cliente' => '11', 
            'id_mascota' => '6', 
        ]);
        clienteMascota::create([
            'id_cliente' => '12', 
            'id_mascota' => '7', 
        ]);
    }
}
