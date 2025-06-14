<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:categorias.index')->only('index');
    }
    public function index(Request $request)
    
    {   $busqueda = $request->busqueda;
        $categorias = Categoria::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'servicio' => $categorias,
            'busqueda' => $busqueda,
        ];
        return view('categorias.index', compact('categorias'));}
    
        public function store(StoreCategoriaRequest $request) 
    {
        Categoria::create([
            'nombre' => $request->nombre,
        ]);
        return redirect(route('categorias.index'));
    }

    public function datas($id){
        $categorias = Categoria::find($id);
        return $categorias;
    }
    public function update(UpdateCategoriaRequest $request, $id) {
        $categorias = Categoria::find($id);
        $data = [
            'nombre' => $request->nombre,
        ];
        $categorias->update($data);
        return redirect(route('categorias.index'));
    }

    public function show(Categoria $proveedore)
    {
        return view('categorias.show', compact('categorias'));
    }
}
