<?php

namespace App\View\Components;

use App\Models\Cirugia;
use App\Models\Enfermedad;
use App\Models\Vacuna;
use Illuminate\View\Component;

class DiagnosticosInput extends Component
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
        return view('components.forms.diagnosticos-input');
    }


    public function enfermedades(){
        return Enfermedad::get();
    }

    public function vacunas(){
        return Vacuna::get();
    }

    public function cirugias(){
        return Cirugia::get();
    }

}
