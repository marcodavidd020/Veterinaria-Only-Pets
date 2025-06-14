<?php

namespace Database\Seeders;

use App\Models\Turno;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turno::create([
            'horario_entrada' => '7:00', 
            'horario_salida' => '15:00', 
        ]);
        Turno::create([
            'horario_entrada' => '15:00', 
            'horario_salida' => '23:00', 
        ]);
        Turno::create([
            'horario_entrada' => '23:00', 
            'horario_salida' => '3:00', 
        ]);
        Turno::create([
            'horario_entrada' => '3:00', 
            'horario_salida' => '7:00', 
        ]);
    }
}
