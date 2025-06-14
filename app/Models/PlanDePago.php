<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDePago extends Model
{
    use HasFactory;
    protected $table = 'plan_de_pagos';

    protected $fillable  = [ 
        'nro_cuotas', 
        'monto_cuota', 
        'id_servicio', 
    ];
}
