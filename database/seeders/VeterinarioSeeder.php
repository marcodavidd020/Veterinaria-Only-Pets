<?php

namespace Database\Seeders;

use App\Models\Veterinario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeterinarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veterinario::create([
            'id' => '2', 
            'profesion' => 'Medico general', 
            'id_servicio' => '1', 
        ]);
        Veterinario::create([
            'id' => '6', 
            'profesion' => 'Medico general', 
            'id_servicio' => '1', 
        ]);
        Veterinario::create([
            'id' => '7', 
            'profesion' => 'Medico de cirugia', 
            'id_servicio' => '5', 
        ]);
        Veterinario::create([
            'id' => '8', 
            'profesion' => 'Medico de farmacia', 
            'id_servicio' => '4', 
        ]);
        Veterinario::create([
            'id' => '14', 
            'profesion' => 'Medico interno', 
            'id_servicio' => '3', 
        ]);
        Veterinario::create([
            'id' => '15', 
            'profesion' => 'Estetica', 
            'id_servicio' => '2', 
        ]);

    }
}
