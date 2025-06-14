<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    use HasFactory;
    protected $table = 'solicitud_servicios';

    protected $fillable  = [ 
        'id_cliente', 
        'id_servicio', 
        'id_recibo', 
        'id_mascota',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    public function recibo()
    {
        return $this->belongsTo(Recibo::class, 'id_recibo');
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }
    
}
