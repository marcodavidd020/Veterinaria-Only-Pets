<?php

namespace Database\Seeders;

use App\Models\TurnoVet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnoVetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TurnoVet::create([
            'id_veterinario' => '2', 
            'id_turno' => '1', 
        ]);
        TurnoVet::create([
            'id_veterinario' => '6', 
            'id_turno' => '2', 
        ]);
        TurnoVet::create([
            'id_veterinario' => '7', 
            'id_turno' => '2', 
        ]);
        TurnoVet::create([
            'id_veterinario' => '8', 
            'id_turno' => '4', 
        ]);
        TurnoVet::create([
            'id_veterinario' => '14', 
            'id_turno' => '4', 
        ]);
        TurnoVet::create([
            'id_veterinario' => '15', 
            'id_turno' => '3', 
        ]);
        TurnoVet::create([
            'id_veterinario' => '14', 
            'id_turno' => '3', 
        ]);
    }
}
