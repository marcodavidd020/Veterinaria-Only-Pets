<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;
    protected $table = 'veterinarios';

    protected $fillable = ['id', 'profesion', 'id_servicio'];


    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class,'id_servicio');
    }


    public function turno(){
        return $this->hasMany(TurnoVet::class, 'id_veterinario');
    }
    
    public function turno_vets()
    {
        return $this->belongsToMany(Turno::class, 'turno_vets', 'id_veterinario', 'id_turno');

    }
}
