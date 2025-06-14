<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accion extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    
    protected $table = 'acciones';
    public $timestamps = false;

    protected $fillable = [
        'accion', 
        'descripcion', 
        'fecha', 
        'hora',
        'id_bitacora', 
    ];

    
    public $orderable = [
        'id',
        'persona.nombre',
        'persona.ap_paterno',
        'persona.ap_materno',
        'accion',
        'descripcion',
        'fecha',
        'hora',
        'id_bitacora', 
    ];

    public $filterable = [
        'id',
        'persona.nombre',
        'persona.apellido_paterno',
        'persona.apellido_materno',
        'accion',
        'descripcion',
        'fecha',
        'hora',
        'id_bitacora', 
    ];


    public function bitacora()
    {
        return $this->belongsTo(Bitacora::class, 'id_bitacora');
    }


 
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'id_bitacora');
    }


    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_bitacora');
    }



}
