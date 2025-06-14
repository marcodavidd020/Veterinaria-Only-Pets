<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PersonaSeeder::class);
        $this->call(TelefonoSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(BitacoraSeeder::class);
        $this->call(AccionSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(VeterinarioSeeder::class);
        $this->call(AdministrativoSeeder::class);
        $this->call(TurnoSeeder::class);
        $this->call(TurnoVetSeeder::class);
        $this->call(TurnoAdminSeeder::class);
        $this->call(MascotaSeeder::class);
        $this->call(ClienteMascotaSeeder::class);
        $this->call(HistorialClinicoSeeder::class);
        $this->call(VacunaSeeder::class);
        $this->call(EnfermedadSeeder::class);
        $this->call(CirugiaSeeder::class);
        $this->call(DetalleVacunaSeeder::class);
        $this->call(DetalleCirugiaSeeder::class);
        $this->call(DetalleEnfermedadSeeder::class);
        $this->call(DetalleHistorialSeeder::class);
        $this->call(PlanDePagoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(NotaIngresoSeeder::class);
        $this->call(ReciboSeeder::class);
        $this->call(SolicitudServicioSeeder::class);
        $this->call(DetalleVentaSeeder::class);
    }
}
