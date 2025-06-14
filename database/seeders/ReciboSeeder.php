<?php

namespace Database\Seeders;

use App\Models\Recibo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReciboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //recibo de cirugia  
        Recibo::create([
            'fecha' => '2022-03-15', 
            'concepto' => 'Cirugia', 
            'monto_cancelado' => '1000', 
            'saldo' => '0', 
            'monto_total' => '1000', 
            'id_administrativo'=> '4', 
        ]);
        Recibo::create([
            'fecha' => '2022-04-10', 
            'concepto' => 'Cirugia', 
            'monto_cancelado' => '1000', 
            'saldo' => '0', 
            'monto_total' => '1000', 
            'id_administrativo'=> '4', 
        ]);
        Recibo::create([
            'fecha' => '2022-04-30', 
            'concepto' => 'Cirugia', 
            'monto_cancelado' => '1000', 
            'saldo' => '0', 
            'monto_total' => '1000', 
            'id_administrativo'=> '4', 
        ]);


        //recibos de cirugia con plan de pago
        Recibo::create([
            'fecha' => '2022-03-10', 
            'concepto' => 'Cirugia', 
            'monto_cancelado' => '250', 
            'saldo' => '750', 
            'monto_total' => '250', 
            'id_administrativo'=> '4', 
        ]);
        Recibo::create([
            'fecha' => '2022-03-11', 
            'concepto' => 'Pagode de plan de pago', 
            'monto_cancelado' => '250', 
            'saldo' => '500', 
            'monto_total' => '250', 
            'id_administrativo'=> '4', 
        ]);
        Recibo::create([
            'fecha' => '2022-03-12', 
            'concepto' => 'Pago de plan de pago', 
            'monto_cancelado' => '250', 
            'saldo' => '250', 
            'monto_total' => '250', 
            'id_administrativo'=> '4', 
        ]);
        Recibo::create([
            'fecha' => '2022-03-13', 
            'concepto' => 'Pago de plan de pago', 
            'monto_cancelado' => '250', 
            'saldo' => '0', 
            'monto_total' => '250', 
            'id_administrativo'=> '4', 
        ]);

        //recibo de vacunas
        Recibo::create([
            'fecha' => '2022-03-10', 
            'concepto' => 'Consulta general - Vacunacion', 
            'monto_cancelado' => '20', 
            'saldo' => '0', 
            'monto_total' => '20', 
            'id_administrativo'=> '3', 
        ]);
        Recibo::create([
            'fecha' => '2022-03-20', 
            'concepto' => 'Consulta general - Vacunacion', 
            'monto_cancelado' => '20', 
            'saldo' => '0', 
            'monto_total' => '20', 
            'id_administrativo'=> '3', 
        ]);


        Recibo::create([
            'fecha' => '2022-03-20', 
            'concepto' => 'Consulta general - Vacunacion', 
            'monto_cancelado' => '20', 
            'saldo' => '0', 
            'monto_total' => '20', 
            'id_administrativo'=> '3', 
        ]);
        Recibo::create([
            'fecha' => '2022-03-30', 
            'concepto' => 'Consulta general - Vacunacion', 
            'monto_cancelado' => '20', 
            'saldo' => '0', 
            'monto_total' => '20', 
            'id_administrativo'=> '5', 
        ]);
        

        Recibo::create([
            'fecha' => '2022-03-10', 
            'concepto' => 'Consulta general - Vacunacion', 
            'monto_cancelado' => '20', 
            'saldo' => '0', 
            'monto_total' => '20', 
            'id_administrativo'=> '3', 
        ]);

        
        //recibo de productos vendidos
        Recibo::create([
            'fecha' => '2022-05-01', 
            'concepto' => 'Compra de producto', 
            'monto_cancelado' => '120', 
            'saldo' => '0', 
            'monto_total' => '120', 
            'id_administrativo'=> '3', 
        ]);
        Recibo::create([
            'fecha' => '2022-05-01', 
            'concepto' => 'Compra de producto', 
            'monto_cancelado' => '120', 
            'saldo' => '0', 
            'monto_total' => '120', 
            'id_administrativo'=> '3', 
        ]);


        Recibo::create([
            'fecha' => '2022-05-02', 
            'concepto' => 'Compra de producto', 
            'monto_cancelado' => '1000', 
            'saldo' => '0', 
            'monto_total' => '1000', 
            'id_administrativo'=> '4', 
        ]);
        Recibo::create([
            'fecha' => '2022-05-04', 
            'concepto' => 'Compra de producto', 
            'monto_cancelado' => '40', 
            'saldo' => '0', 
            'monto_total' => '40', 
            'id_administrativo'=> '4', 
        ]);
    }
}
