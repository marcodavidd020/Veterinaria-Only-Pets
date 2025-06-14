<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurnoVet extends Model
{
    use HasFactory;
    protected $table = 'turno_vets';

    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable  = [ 
        'id_veterinario', 
        'id_turno', 
    ];
}
