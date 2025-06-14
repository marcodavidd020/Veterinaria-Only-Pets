<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $table = 'bitacoras';

    protected $fillable  = [ 'descripcion', 'id_usuario'];



    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'id_usuario');
    }

    public function acciones(){
        return $this->hasMany('App\Models\Accion', 'id_bitacora');
    }
}
