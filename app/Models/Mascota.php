<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $table = 'mascotas';

    protected $fillable  = [ 
        'nombre', 
        'raza', 
        'fecha_nacimiento', 
        'especie',
        'descripcion',
        'sexo',
    ];


    public function propietario()
    {
        return $this->belongsToMany(Persona::class,'clientes_mascotas','id_mascota','id_cliente');
    }

    public function historial()
    {
        return $this->hasOne(HistorialClinico::class, 'id_mascota');
    }
}
