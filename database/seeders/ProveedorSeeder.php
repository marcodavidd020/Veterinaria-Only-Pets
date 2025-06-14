<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //proveedor de medicamentos
        Proveedor::create([
            'nombre' => 'Jose Guzman', 
            'direccion' => 'La Guardia', 
            'telefono' => '63182674', 
            'email' => 'joseguzman@gmail.com', 
            'NIT' => '100789', 
        ]);

        //proveedor de ropa
        Proveedor::create([
            'nombre' => 'Juan Salazar', 
            'direccion' => 'Cambodromo', 
            'telefono' => '69125649', 
            'email' => 'salazarjuan@gmail.com', 
            'NIT' => '100317', 
        ]);


        //proveedor de accesorios
        Proveedor::create([
            'nombre' => 'Carlos Peres', 
            'direccion' => 'El Bajio', 
            'telefono' => '70040798', 
            'email' => 'perescarlos@gmail.com', 
            'NIT' => '100618', 
        ]);

        //proveedor de comida
        Proveedor::create([
            'nombre' => 'Pedro Carvajal', 
            'direccion' => 'Av Radial 27', 
            'telefono' => '60030412', 
            'email' => 'carvajalpedro@gmail.com', 
            'NIT' => '100401', 
        ]);

        
    }
}
