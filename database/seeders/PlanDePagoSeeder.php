<?php

namespace Database\Seeders;

use App\Models\PlanDePago;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanDePagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanDePago::create([
            'nro_cuotas' => '4', 
            'monto_cuota' => '250', 
            'id_servicio' => '5', 
        ]);
    }
}
