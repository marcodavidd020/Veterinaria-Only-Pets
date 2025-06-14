<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;
    protected $table = 'recibos';

    protected $fillable  = [ 
        'fecha', 
        'concepto', 
        'monto_cancelado', 
        'saldo',
        'monto_total',
        'id_administrativo',
    ];
}
