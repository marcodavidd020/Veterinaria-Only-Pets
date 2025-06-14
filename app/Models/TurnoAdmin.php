<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurnoAdmin extends Model
{
    use HasFactory;
    protected $table = 'turno_admins';

    public $timestamps = false;

    public $incrementing = false;
    
    protected $fillable  = [ 
        'id_administrativo', 
        'id_turno', 
    ];
}
