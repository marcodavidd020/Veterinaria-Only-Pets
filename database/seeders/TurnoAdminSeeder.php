<?php

namespace Database\Seeders;

use App\Models\TurnoAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnoAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TurnoAdmin::create([
            'id_administrativo' => '3', 
            'id_turno' => '1', 
        ]);
        TurnoAdmin::create([
            'id_administrativo' => '4', 
            'id_turno' => '2', 
        ]);
        TurnoAdmin::create([
            'id_administrativo' => '5', 
            'id_turno' => '3', 
        ]);

    }
}
