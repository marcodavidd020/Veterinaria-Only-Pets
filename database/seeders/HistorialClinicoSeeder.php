<?php

namespace Database\Seeders;

use App\Models\HistorialClinico;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorialClinicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HistorialClinico::create([
            'id_mascota' => '1', 
            'peso' => '15.4', 
            'talla' => '5',  
        ]);
        HistorialClinico::create([
            'id_mascota' => '2', 
            'peso' => '20.2', 
            'talla' => '7',  
        ]);
        HistorialClinico::create([
            'id_mascota' => '3', 
            'peso' => '17.7', 
            'talla' => '6',  
        ]);
        HistorialClinico::create([
            'id_mascota' => '4', 
            'peso' => '15.4', 
            'talla' => '5',  
        ]);
        HistorialClinico::create([
            'id_mascota' => '5', 
            'peso' => '13.9', 
            'talla' => '4',  
        ]);
        HistorialClinico::create([
            'id_mascota' => '6', 
            'peso' => '21.0', 
            'talla' => '8',  
        ]);
        HistorialClinico::create([
            'id_mascota' => '7', 
            'peso' => '14.9', 
            'talla' => '5',  
        ]);
    }
}
