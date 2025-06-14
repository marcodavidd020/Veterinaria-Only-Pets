<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Medicina', 
        ]);
        Categoria::create([
            'nombre' => 'Ropa', 
        ]);
        Categoria::create([
            'nombre' => 'Accesorios', 
        ]);
        Categoria::create([
            'nombre' => 'Comida', 
        ]);
        Categoria::create([
            'nombre' => 'Higiene', 
        ]);
    }
}
