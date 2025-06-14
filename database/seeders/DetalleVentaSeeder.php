<?php

namespace Database\Seeders;

use App\Models\DetalleVenta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleVenta::create([
            'id_recibo' => '13', 
            'id_producto' => '15', 
            'cantidad' => '1', 
            'precio_total' => '120', 
        ]);
        DetalleVenta::create([
            'id_recibo' => '14', 
            'id_producto' => '15', 
            'cantidad' => '1', 
            'precio_total' => '120', 
        ]);
        DetalleVenta::create([
            'id_recibo' => '15', 
            'id_producto' => '14', 
            'cantidad' => '1', 
            'precio_total' => '1000', 
        ]);
        DetalleVenta::create([
            'id_recibo' => '16', 
            'id_producto' => '1', 
            'cantidad' => '1', 
            'precio_total' => '40', 
        ]);

    }
}
