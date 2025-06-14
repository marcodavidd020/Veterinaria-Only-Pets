<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaIngreso extends Model
{
    use HasFactory;
    protected $table = 'notas_ingresos';

    protected $fillable  = [ 
        'id_proveedor', 
        'id_producto', 
        'id_administrativo', 
        'cantidad',
        'fecha',
        'hora',
        'monto_total',
    ];

    public function proveedor() {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function producto() {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function administrativo() {
        return $this->belongsTo(Administrativo::class, 'id_administrativo');
    }
}
