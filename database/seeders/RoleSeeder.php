<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'super-admin']);
        $recepcion = Role::create(['name' => 'recepcionista']);
        $vet = Role::create(['name' => 'veterinario']);
        $client = Role::create(['name' => 'cliente']);
        $supervisor = Role::create(['name' => 'supervisor']);

        Permission::create(['name' => 'usuarios.index'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'usuarios.create'])->syncRoles([$recepcion]);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$recepcion]);
        Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$recepcion]);

        Permission::create(['name' => 'administrativos.index']);
        Permission::create(['name' => 'administrativos.create']);
        Permission::create(['name' => 'administrativos.edit']);

        Permission::create(['name' => 'veterinarios.index']);
        Permission::create(['name' => 'veterinarios.create']);
        Permission::create(['name' => 'veterinarios.edit']);

        Permission::create(['name' => 'clientes.index'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'clientes.create'])->syncRoles([$recepcion]);
        Permission::create(['name' => 'clientes.edit'])->syncRoles([$recepcion]);

        Permission::create(['name' => 'mascotas.index'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'mascotas.create'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'mascotas.edit'])->syncRoles([$vet, $recepcion]);

        Permission::create(['name' => 'vacunas.index'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'vacunas.create'])->syncRoles([ $vet]);
        Permission::create(['name' => 'vacunas.edit'])->syncRoles([$vet]);
        Permission::create(['name' => 'vacunas.destroy'])->syncRoles([ $vet]);

        Permission::create(['name' => 'cirugias.index'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'cirugias.create'])->syncRoles([ $vet]);
        Permission::create(['name' => 'cirugias.edit'])->syncRoles([$vet]);
        Permission::create(['name' => 'cirugias.destroy'])->syncRoles([ $vet]);

        Permission::create(['name' => 'enfermedades.index'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'enfermedades.create'])->syncRoles([ $vet]);
        Permission::create(['name' => 'enfermedades.edit'])->syncRoles([ $vet]);
        Permission::create(['name' => 'enfermedades.destroy'])->syncRoles([ $vet]);

        Permission::create(['name' => 'historiales.index'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'historiales.create'])->syncRoles([ $vet]);
        Permission::create(['name' => 'historiales.edit'])->syncRoles([ $vet]);
        Permission::create(['name' => 'historiales.show'])->syncRoles([ $vet, $recepcion]);

        Permission::create(['name' => 'servicios.index'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'servicios.create']);
        Permission::create(['name' => 'servicios.edit']);
        Permission::create(['name' => 'servicios.destroy']);

        Permission::create(['name' => 'cita-servicio.index'])->syncRoles([ $vet, $recepcion]);
        Permission::create(['name' => 'cita-servicio.create'])->syncRoles([ $vet, $recepcion]);
        
        Permission::create(['name' => 'turnos.index'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'turnos.create'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'turnos.edit'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'turnos.destroy'])->syncRoles([ $recepcion]);

        Permission::create(['name' => 'bitacora']);

        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.destroy']);

        Permission::create(['name' => 'proveedores.index'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'proveedores.create'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'proveedores.edit'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'proveedores.destroy']);

        Permission::create(['name' => 'productos.index'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'productos.create'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'productos.comprar']);
        Permission::create(['name' => 'productos.vender']);
        Permission::create(['name' => 'productos.edit'])->syncRoles([ $recepcion]);
        Permission::create(['name' => 'productos.destroy']);

        Permission::create(['name' => 'categorias.index'])->syncRoles([ $supervisor]);
        Permission::create(['name' => 'categorias.create'])->syncRoles([ $supervisor]);
        Permission::create(['name' => 'categorias.edit'])->syncRoles([ $supervisor]);
        Permission::create(['name' => 'categorias.destroy'])->syncRoles([ $supervisor]);
    }
}
