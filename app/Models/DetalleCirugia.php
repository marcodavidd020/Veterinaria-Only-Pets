<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCirugia extends Model
{
    use HasFactory;
    protected $table = 'detalles_cirugias';

    protected $fillable  = [ 
        'id_cirugia', 
        'id_historial', 
        'fecha',
        'hora',
        'veterinario_encargado'
    ];
}
