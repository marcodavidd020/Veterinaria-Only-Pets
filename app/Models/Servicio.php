<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicios';

    protected $fillable  = [
        'nombre',
        'descripcion',
        'precio',
    ];

    public function plan_de_pagos()
    {
        return $this->hasOne(PlanDePago::class,'id_servicio');
    }
}
