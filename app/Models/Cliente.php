<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';

    protected $fillable  = ['id'];


    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }

    public function telefonos(){
        return $this->hasMany(Telefono::class, 'id_persona');
    }
}
