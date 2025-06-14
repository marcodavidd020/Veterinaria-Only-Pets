<?php

namespace App\View\Components;

use App\Models\Servicio;
use App\Models\Turno;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class InputDatos extends Component
{
    public $id;

    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-datos');
    }

    public function getTurnos(){
        return Turno::get();
    }

    public function getServicios(){
        return Servicio::get();
    }	

    public function getRoles(){
        $roles = Role::where('id','<>','1')
                ->where('id','<>','4')
                ->where('id','<>','3')->get();
        return $roles;
    }
}
