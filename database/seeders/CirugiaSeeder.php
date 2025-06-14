<?php

namespace Database\Seeders;

use App\Models\Cirugia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CirugiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cirugia::create([
            'nombre' => 'Cirugía oncológica', 
            'tipo' => 'Cancer', 
        ]);
        Cirugia::create([
            'nombre' => 'Cirugía digestiva.', 
            'tipo' => 'Gastrointestinal', 
        ]);
        Cirugia::create([
            'nombre' => 'Cirugía del aparato urinario.', 
            'tipo' => 'Via urinaria', 
        ]);

        //Hernia = Desplazamiento de uno de los discos intervertebrales
        Cirugia::create([
            'nombre' => 'Operación de hernias', 
            'tipo' => 'Huesos', 
        ]);
    }
}
