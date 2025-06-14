<?php

namespace Database\Seeders;

use App\Models\Enfermedad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enfermedad::create([
            'nombre' => 'Rabia', 
            'tipo' => 'bacteria', 
        ]);
        Enfermedad::create([
            'nombre' => 'Sarna demodectica', 
            'tipo' => 'Acaro', 
        ]);
        Enfermedad::create([
            'nombre' => 'Moquillo', 
            'tipo' => 'virus', 
        ]);
        Enfermedad::create([
            'nombre' => 'Leptospirosis', 
            'tipo' => 'bacteria', 
        ]);
        Enfermedad::create([
            'nombre' => 'Parvovirus', 
            'tipo' => 'virus', 
        ]);
        Enfermedad::create([
            'nombre' => 'Brucelosis', 
            'tipo' => 'bacteria', 
        ]);
        Enfermedad::create([
            'nombre' => 'Hepatitis canina', 
            'tipo' => 'virus', 
        ]);
        Enfermedad::create([
            'nombre' => 'Borreliosis canina', 
            'tipo' => 'bacteria', 
        ]);
        Enfermedad::create([
            'nombre' => 'Traqueobronquitis', 
            'tipo' => 'virus', 
        ]);
        Enfermedad::create([
            'nombre' => 'Otitis', 
            'tipo' => 'infeccion', 
        ]);
        Enfermedad::create([
            'nombre' => 'Conjuntivitis', 
            'tipo' => 'inflam.', 
        ]);
        Enfermedad::create([
            'nombre' => 'Alergias cutaneas', 
            'tipo' => 'alergia', 
        ]);
        Enfermedad::create([
            'nombre' => 'Gastritis', 
            'tipo' => 'inflam.', 
        ]);
        Enfermedad::create([
            'nombre' => 'Diarrea', 
            'tipo' => 'varios', 
        ]);
        Enfermedad::create([
            'nombre' => 'Leishmaniosis', 
            'tipo' => 'parasit.', 
        ]);
        Enfermedad::create([
            'nombre' => 'Mastitis', 
            'tipo' => 'infeccion', 
        ]);
        Enfermedad::create([
            'nombre' => 'Torsion gastrica', 
            'tipo' => 'dilat. g.', 
        ]);
        Enfermedad::create([
            'nombre' => 'Cancer', 
            'tipo' => 'afeccion', 
        ]);
    }
}
