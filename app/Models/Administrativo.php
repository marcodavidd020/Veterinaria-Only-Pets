<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Administrativo extends Model
{
    use HasFactory;
    protected $table = 'administrativos';

    protected $fillable = ['id', 'profesion'];


    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }


    public function turno()
    {
        return $this->hasMany(TurnoAdmin::class, 'id_administrativo');
    }

    public function turno_admin()
    {
        return $this->belongsToMany(Turno::class, 'turno_admins', 'id_administrativo', 'id_turno');
    }
    

}
