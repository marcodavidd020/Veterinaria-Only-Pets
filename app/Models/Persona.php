<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';

    protected $fillable = [
        'nombre', 
        'apellido_paterno', 
        'apellido_materno', 
        'ci', 
        'direccion', 
        'email', 
        'fecha_de_nacimiento', 
        'sexo',
    ];

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_persona');
    }
    /*public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id');
    }*/

    public function administrativo()
    {
        return $this->hasOne(Administrativo::class, 'id');
    }


    public function telefonos(){
        return $this->hasMany(Telefono::class, 'id_persona');
    }
  
    public function veterinario()
    {
        return $this->hasOne(Veterinario::class, 'id');

    }

    
    public function mascotas(){
        return $this->belongsToMany(Mascota::class, 'clientes_mascotas', 'id_cliente', 'id_mascota');
    }
}
