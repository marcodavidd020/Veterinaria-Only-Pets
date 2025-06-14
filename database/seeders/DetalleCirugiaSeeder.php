<?php

namespace Database\Seeders;

use App\Models\DetalleCirugia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleCirugiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1er mascota
        DetalleCirugia::create([
            'id_cirugia' => '1', 
            'id_historial' => '1', 
            'fecha' => '2022-03-15', 
            'hora' => '17:00', 
            'veterinario_encargado' => 'Lucia Jimines', 
        ]);
        DetalleCirugia::create([
            'id_cirugia' => '1', 
            'id_historial' => '1', 
            'fecha' => '2022-04-10', 
            'hora' => '17:00', 
            'veterinario_encargado' => 'Lucia Jimines', 
        ]);
        DetalleCirugia::create([
            'id_cirugia' => '1', 
            'id_historial' => '1', 
            'fecha' => '2022-04-30', 
            'hora' => '18:00', 
            'veterinario_encargado' => 'Lucia Jimines', 
        ]);

        //2do mascota
        DetalleCirugia::create([
            'id_cirugia' => '2', 
            'id_historial' => '2', 
            'fecha' => '2022-03-10', 
            'hora' => '18:30', 
            'veterinario_encargado' => 'Lucia Jimines', 
        ]);

    }
}
