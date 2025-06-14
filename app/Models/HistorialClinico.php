<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialClinico extends Model
{
    use HasFactory;
    protected $table = 'historiales_clinicos';

    protected $fillable  = [ 
        'id_mascota', 
        'peso', 
        'talla'
    ];

    public function mascota() {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }

    public function detalle_historial() {
        return $this->hasMany(DetalleHistorial::class, 'id_historial');
    }

    public function cirugia() {
        return $this->belongsToMany(Cirugia::class, 'detalles_cirugias', 'id_historial', 'id_cirugia')->withPivot('fecha', 'hora', 'veterinario_encargado');
    }

    public function vacuna() {
        return $this->belongsToMany(Vacuna::class, 'detalles_vacunas', 'id_historial', 'id_vacuna')->withPivot('dosis', 'fecha_aplicacion', 'fecha_prox_aplicacion');
    }

    public function enfermedad() {
        return $this->belongsToMany(Enfermedad::class, 'detalle_enfermedades', 'id_historial', 'id_enfermedad')->withPivot('fecha_deteccion', 'inicio_tratamiento', 'fin_tratamiento');
    }

}
