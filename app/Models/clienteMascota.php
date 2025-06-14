<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clienteMascota extends Model
{
    use HasFactory;
    public $incrementing = false;
    
    protected $table = 'clientes_mascotas';

    protected $fillable  = [ 'id_cliente', 'id_mascota'];
}
