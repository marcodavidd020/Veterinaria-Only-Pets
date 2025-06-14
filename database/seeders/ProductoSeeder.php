<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Medicamentos
        Producto::create([
            'nombre' => 'Vitamina C', 
            'descripcion' => '80mg 32 comprimidos', 
            'foto' => null, 
            'costo' => '30', 
            'precio' => '40', 
            'marca'=> 'Elanco', 
            'cantidad' => '20',
            'id_categoria' => '1', 
        ]);
        Producto::create([
            'nombre' => 'Cimalgex', 
            'descripcion' => '30mg 32 comprimidos', 
            'foto' => null, 
            'costo' => '40', 
            'precio' => '50', 
            'marca'=> 'Bayer', 
            'cantidad' => '20',
            'id_categoria' => '1', 
        ]);
        Producto::create([
            'nombre' => 'Cimalgex', 
            'descripcion' => '80mg 144 comprimidos', 
            'foto' => null, 
            'costo' => '60', 
            'precio' => '70', 
            'marca'=> 'bayer', 
            'cantidad' => '20',
            'id_categoria' => '1', 
        ]);
        Producto::create([
            'nombre' => 'Firodyl', 
            'descripcion' => '250mg 6 comprimidos', 
            'foto' => null, 
            'costo' => '90', 
            'precio' => '100', 
            'marca'=> 'Basic', 
            'cantidad' => '20',
            'id_categoria' => '1', 
        ]);
        Producto::create([
            'nombre' => 'Firodyl', 
            'descripcion' => '62.5mg 12 comprimidos', 
            'foto' => null, 
            'costo' => '90', 
            'precio' => '100', 
            'marca'=> 'Basic', 
            'cantidad' => '20',
            'id_categoria' => '1', 
        ]);
        Producto::create([
            'nombre' => 'Galliprant', 
            'descripcion' => '30 comprimidos', 
            'foto' => null, 
            'costo' => '40', 
            'precio' => '50', 
            'marca'=> 'Vetnil', 
            'cantidad' => '20',
            'id_categoria' => '1', 
        ]);
        Producto::create([
            'nombre' => 'Meloxidyl', 
            'descripcion' => '100ml', 
            'foto' => null, 
            'costo' => '40', 
            'precio' => '50', 
            'marca'=> 'LLoyd', 
            'cantidad' => '20',
            'id_categoria' => '1', 
        ]);


        //Ropa
        Producto::create([
            'nombre' => 'Abrigo', 
            'descripcion' => 'abrigo de algodon', 
            'foto' => null, 
            'costo' => '150', 
            'precio' => '200', 
            'marca'=> 'Adidog', 
            'cantidad' => '10',
            'id_categoria' => '2', 
        ]);
        Producto::create([
            'nombre' => 'Bufanda', 
            'descripcion' => 'bufanda importada', 
            'foto' => null, 
            'costo' => '80', 
            'precio' => '100', 
            'marca'=> 'Petements', 
            'cantidad' => '10',
            'id_categoria' => '2', 
        ]);
        Producto::create([
            'nombre' => 'Chaleco', 
            'descripcion' => 'chaleco color verde', 
            'foto' => null, 
            'costo' => '80', 
            'precio' => '100', 
            'marca'=> 'Harmon&Blaide', 
            'cantidad' => '10',
            'id_categoria' => '2', 
        ]);
        Producto::create([
            'nombre' => 'Impermeable', 
            'descripcion' => 'impermeable color amarillo', 
            'foto' => null, 
            'costo' => '300', 
            'precio' => '350', 
            'marca'=> 'Adidog', 
            'cantidad' => '10',
            'id_categoria' => '2', 
        ]);


        //Accesorios
        Producto::create([
            'nombre' => 'Collar', 
            'descripcion' => 'collar anti pulgas', 
            'foto' => null, 
            'costo' => '10', 
            'precio' => '150', 
            'marca'=> 'Patements', 
            'cantidad' => '10',
            'id_categoria' => '3', 
        ]);
        Producto::create([
            'nombre' => 'Cama', 
            'descripcion' => 'cama de dormir', 
            'foto' => null, 
            'costo' => '400', 
            'precio' => '450', 
            'marca'=> 'Harmon&Blaide', 
            'cantidad' => '10',
            'id_categoria' => '3', 
        ]);
        Producto::create([
            'nombre' => 'Dispensador', 
            'descripcion' => 'dispensador de comida', 
            'foto' => null, 
            'costo' => '900', 
            'precio' => '1000', 
            'marca'=> 'Harmon&Blaide', 
            'cantidad' => '10',
            'id_categoria' => '3', 
        ]);


        //Comida
        Producto::create([
            'nombre' => 'Croqueta', 
            'descripcion' => 'comida para perros', 
            'foto' => null, 
            'costo' => '100', 
            'precio' => '120', 
            'marca'=> 'Patements', 
            'cantidad' => '10',
            'id_categoria' => '4', 
        ]);
        
    }
}
