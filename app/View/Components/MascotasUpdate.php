<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MascotasUpdate extends Component
{

    public $id;    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.mascotas-update');
    }

    public function clientes(){
        return \App\Models\Cliente::get()->load('persona');
    }
}
