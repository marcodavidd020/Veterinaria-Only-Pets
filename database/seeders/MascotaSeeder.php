<?php

namespace Database\Seeders;

use App\Models\Mascota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mascota::create([
            'nombre' => 'Firulais', 
            'raza' => 'Pitbull', 
            'fecha_nacimiento' => '2021-05-14', 
            'especie' => 'perro', 
            'descripcion' => 'color cafe con blanco', 
            'sexo'=> 'Macho', 
        ]);
        Mascota::create([
            'nombre' => 'Monchito', 
            'raza' => 'Bulldog', 
            'fecha_nacimiento' => '2020-01-22', 
            'especie' => 'perro', 
            'descripcion' => 'color negro', 
            'sexo'=> 'Macho', 
        ]);
        Mascota::create([
            'nombre' => 'Manchas', 
            'raza' => 'Boxer', 
            'fecha_nacimiento' => '2021-02-11', 
            'especie' => 'perro', 
            'descripcion' => 'color blanco con negro', 
            'sexo'=> 'Macho', 
        ]);
        Mascota::create([
            'nombre' => 'Boby', 
            'raza' => 'Husky', 
            'fecha_nacimiento' => '2019-12-30', 
            'especie' => 'perro', 
            'descripcion' => 'color cafe', 
            'sexo'=> 'Macho', 
        ]);
        Mascota::create([
            'nombre' => 'Luna', 
            'raza' => 'Doberman', 
            'fecha_nacimiento' => '2019-10-17', 
            'especie' => 'perro', 
            'descripcion' => 'color blanco', 
            'sexo'=> 'Hembra', 
        ]);
        Mascota::create([
            'nombre' => 'Panquesito', 
            'raza' => 'Pitubull', 
            'fecha_nacimiento' => '2018-10-10', 
            'especie' => 'perro', 
            'descripcion' => 'color cafe con negro', 
            'sexo'=> 'Hembra', 
        ]);
        Mascota::create([
            'nombre' => 'Bethoben', 
            'raza' => 'Mastil', 
            'fecha_nacimiento' => '2019-04-07', 
            'especie' => 'perro', 
            'descripcion' => 'color blanco', 
            'sexo'=> 'Macho', 
        ]);
        
    }
}
