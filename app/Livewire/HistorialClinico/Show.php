<?php

namespace App\Livewire\HistorialClinico;

use App\Models\Cirugia;
use App\Models\DetalleCirugia;
use App\Models\DetalleEnfermedad;
use App\Models\DetalleHistorial;
use App\Models\DetalleVacuna;
use App\Models\Enfermedad;
use App\Models\HistorialClinico;
use App\Models\Vacuna;
use App\Models\Veterinario;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRequests;

    public $historial;
    public $enfermedades;
    public $cirugias;
    public $veterinarios;
    public $vacunas;

    public $diagnostico;
    public $hayEnfermedad;
    public $hayVacuna;
    public $hayCirugia;

    public $id_enfermedad;
    public $fecha_inicio_enfermedad;
    public $inicio_tratamiento_enfermedad;
    
    public $id_cirugia;
    public $id_veterinario;
    public $fecha_cirugia;
    public $hora_cirugia;

    public $id_vacuna;
    public $dosis_vacuna;
    public $fecha_proxima_vacuna;

    public function mount(HistorialClinico $historial){
        $this->historial = $historial;
        $this->enfermedades = Enfermedad::all();
        $this->cirugias = Cirugia::all();
        $this->veterinarios = Veterinario::all();
        $this->vacunas = Vacuna::all();
    }

    public function render()
    {
        return view('livewire.historial-clinico.show');
    }

    public function loadHistorial(HistorialClinico $historial){
        $this->historial = HistorialClinico::findOrFail($historial->id);
    }

    public function guardarDiagnostico(){
        DB::beginTransaction();
        try {

            if($this->diagnostico != ""){
                DetalleHistorial::create([
                    'descripcion' => $this->diagnostico,
                    'fecha_consulta' => date("Y-m-d"),
                    'id_historial' => $this->historial->id
                ]);
            }

            if($this->hayEnfermedad){
                DetalleEnfermedad::create([
                    'id_enfermedad' => $this->id_enfermedad,
                    'id_historial' => $this->historial->id,
                    'fecha_deteccion' => $this->fecha_inicio_enfermedad,
                    'inicio_tratamiento' => $this->inicio_tratamiento_enfermedad,
                ]);
            }

            if($this->hayCirugia){
                $veterinario = Veterinario::find($this->id_veterinario);
                $veterinario = $veterinario->persona;
                $nombreVeterinario = $veterinario->nombre.' '.$veterinario->apellido_paterno.' '.$veterinario->apellido_materno;
                DetalleCirugia::create([
                    'id_cirugia' => $this->id_cirugia,
                    'id_historial' => $this->historial->id,
                    'fecha' => $this->fecha_cirugia,
                    'hora' => $this->hora_cirugia,
                    'veterinario_encargado' => $nombreVeterinario,
                ]);
            }

            if($this->hayVacuna){
                DetalleVacuna::create([
                    'id_vacuna' => $this->id_vacuna,
                    'id_historial' => $this->historial->id,
                    'dosis' => $this->dosis_vacuna,
                    'fecha_aplicacion' => date("Y-m-d"),
                    'fecha_prox_aplicacion' => $this->fecha_proxima_vacuna
                ]);
            }
            
            DB::commit();

            $this->loadHistorial($this->historial);

        } catch (Exception $e) {
            DB::rollBack();
        }
    }
} 