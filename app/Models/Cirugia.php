<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cirugia extends Model
{
    use HasFactory;
    protected $table = 'cirugias';

    protected $fillable  = [ 'nombre', 'tipo'];

    public function detalle_cirugia() {
        return $this->hasMany(DetalleCirugia::class, 'id_cirugia');
    }

    public function historial() {
        return $this->belongsToMany(HistorialClinico::class, 'detalles_cirugias', 'id_historial', 'id_cirugia');
    }
}
