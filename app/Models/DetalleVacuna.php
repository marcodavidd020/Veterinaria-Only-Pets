<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVacuna extends Model
{
    use HasFactory;
    protected $table = 'detalles_vacunas';

    protected $fillable  = [ 
        'id_vacuna', 
        'id_historial', 
        'dosis', 
        'fecha_aplicacion', 
        'fecha_prox_aplicacion',
    ];
}
