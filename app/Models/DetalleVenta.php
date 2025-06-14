<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = 'detalles_ventas';

    protected $fillable  = [ 
        'id_recibo', 
        'id_producto', 
        'cantidad', 
        'precio_total',
    ];

    public function recibo() {
        return $this->belongsTo(Recibo::class, 'id_recibo');
    }

    public function producto() {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
