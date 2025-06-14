<?php

namespace App\Http\Livewire\Bitacora;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Accion;
use App\Models\Bitacora;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';

    public array $orderable;

    public function mount(){
        
        $this->orderable = (new Accion())->orderable;
    }


    public function render()
    {
        $query = Accion::with(['persona'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => 'id',
            'order_direction' => 'desc',
        ]);


        $acciones = $query->paginate(10);

        return view('livewire.bitacora.index', compact('acciones'));
    }
}
