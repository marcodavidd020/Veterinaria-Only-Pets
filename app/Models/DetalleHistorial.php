<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHistorial extends Model
{
    use HasFactory;
    protected $table = 'detalles_historial';

    protected $fillable  = [ 
        'descripcion', 
        'fecha_consulta',
        'fecha_prox_consulta',
        'id_historial',
    ];

    public function historial() {
        return $this->belongsTo(HistorialClinico::class, 'id_historial');
    }
}
