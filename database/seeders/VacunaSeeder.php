<?php

namespace Database\Seeders;

use App\Models\Vacuna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vacuna::create([
            'nombre' => 'V. Parvovirus', 
        ]);
        Vacuna::create([
            'nombre' => 'V. Moquillo', 
        ]);
        Vacuna::create([
            'nombre' => 'V. Polivalente', 
        ]);
        Vacuna::create([
            'nombre' => 'V. Rabia', 
        ]);
        Vacuna::create([
            'nombre' => 'V. Lyme', 
        ]);
        Vacuna::create([
            'nombre' => 'V. Leptospirosis', 
        ]);
        Vacuna::create([
            'nombre' => 'V. Leishmaniosis', 
        ]);
    }
}
