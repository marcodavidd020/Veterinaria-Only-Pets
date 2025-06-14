<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    protected $table = 'turnos';

    protected $fillable  = [ 
        'horario_entrada', 
        'horario_salida', 
    ];

    public function turno_admin()
    {
        return $this->belongsToMany(Administrativo::class, 'turno_admins', 'id_administrativo', 'id_turno');
    }

    public function turno_vets()
    {
        return $this->belongsToMany(Veterinario::class, 'turno_vets', 'id_veterinario', 'id_turno');
    }
}
