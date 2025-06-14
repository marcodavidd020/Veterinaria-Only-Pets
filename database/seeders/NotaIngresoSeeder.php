<?php

namespace Database\Seeders;

use App\Models\NotaIngreso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotaIngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Productos de medicina
        NotaIngreso::create([
            'id_proveedor' => '1', 
            'id_producto' => '1', 
            'id_administrativo' => '3', 
            'cantidad' => '21', 
            'fecha' => '2022-01-05', 
            'hora'=> '9:00', 
            'monto_total' => '630', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '1', 
            'id_producto' => '2', 
            'id_administrativo' => '3', 
            'cantidad' => '20', 
            'fecha' => '2022-01-05', 
            'hora'=> '9:50', 
            'monto_total' => '800', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '1', 
            'id_producto' => '3', 
            'id_administrativo' => '3', 
            'cantidad' => '20', 
            'fecha' => '2022-01-06', 
            'hora'=> '10:00', 
            'monto_total' => '1200', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '1', 
            'id_producto' => '4', 
            'id_administrativo' => '3', 
            'cantidad' => '20', 
            'fecha' => '2022-01-10', 
            'hora'=> '10:15', 
            'monto_total' => '1800', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '1', 
            'id_producto' => '5', 
            'id_administrativo' => '3', 
            'cantidad' => '20', 
            'fecha' => '2022-01-11', 
            'hora'=> '9:30', 
            'monto_total' => '1800', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '1', 
            'id_producto' => '6', 
            'id_administrativo' => '3', 
            'cantidad' => '21', 
            'fecha' => '2022-01-11', 
            'hora'=> '11:00', 
            'monto_total' => '1200', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '1', 
            'id_producto' => '7', 
            'id_administrativo' => '3', 
            'cantidad' => '20', 
            'fecha' => '2022-01-012', 
            'hora'=> '9:55', 
            'monto_total' => '1200', 
        ]);


        //Productos de ropa
        NotaIngreso::create([
            'id_proveedor' => '2', 
            'id_producto' => '8', 
            'id_administrativo' => '4', 
            'cantidad' => '10', 
            'fecha' => '2022-01-05', 
            'hora'=> '16:00', 
            'monto_total' => '1500', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '2', 
            'id_producto' => '9', 
            'id_administrativo' => '4', 
            'cantidad' => '10', 
            'fecha' => '2022-01-07', 
            'hora'=> '17:00', 
            'monto_total' => '800', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '2', 
            'id_producto' => '10', 
            'id_administrativo' => '4', 
            'cantidad' => '10', 
            'fecha' => '2022-01-07', 
            'hora'=> '19:00', 
            'monto_total' => '800', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '2', 
            'id_producto' => '11', 
            'id_administrativo' => '4', 
            'cantidad' => '10', 
            'fecha' => '2022-01-08', 
            'hora'=> '18:00', 
            'monto_total' => '3000', 
        ]);

        //Productos de accesorios
        NotaIngreso::create([
            'id_proveedor' => '3', 
            'id_producto' => '12', 
            'id_administrativo' => '3', 
            'cantidad' => '10', 
            'fecha' => '2022-01-06', 
            'hora'=> '9:00', 
            'monto_total' => '1000', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '3', 
            'id_producto' => '13', 
            'id_administrativo' => '3', 
            'cantidad' => '10', 
            'fecha' => '2022-01-06', 
            'hora'=> '9:30', 
            'monto_total' => '4000', 
        ]);
        NotaIngreso::create([
            'id_proveedor' => '3', 
            'id_producto' => '14', 
            'id_administrativo' => '3', 
            'cantidad' => '11', 
            'fecha' => '2022-01-07', 
            'hora'=> '10:00', 
            'monto_total' => '9900', 
        ]);


        //Productos de comida
        NotaIngreso::create([
            'id_proveedor' => '4', 
            'id_producto' => '15', 
            'id_administrativo' => '4', 
            'cantidad' => '11', 
            'fecha' => '2022-01-06', 
            'hora'=> '10:35', 
            'monto_total' => '1100', 
        ]);
        

    }
}
