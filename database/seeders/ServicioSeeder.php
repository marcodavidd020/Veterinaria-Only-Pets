<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([
            'nombre' => 'Consulta', 
            'descripcion' => 'consulta general', 
            'precio' => '20', 
        ]);
        Servicio::create([
            'nombre' => 'Estetica', 
            'descripcion' => 'peluqueria y limpieza', 
            'precio' => '60', 
        ]);
        Servicio::create([
            'nombre' => 'Medicina interna', 
            'descripcion' => 'medicina interna', 
            'precio' => '100', 
        ]);
        Servicio::create([
            'nombre' => 'Farmacia', 
            'descripcion' => 'medicamentos', 
            'precio' => '80', 
        ]);
        Servicio::create([
            'nombre' => 'Cirugia', 
            'descripcion' => 'cirugia interna', 
            'precio' => '1000', 
        ]);
        
    }
}
