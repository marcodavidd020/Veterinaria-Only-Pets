<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdministrativoRequest;
use App\Models\Administrativo;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Actions\AdministrativoAction;
use App\Http\Requests\UpdateAdministrativoRequest;
use App\Models\Telefono;
use App\Models\Turno;
use Illuminate\Support\Facades\DB;

class AdministrativoController extends Controller
{   

    public function __construct()
    {
        $this->middleware('can:administrativos.index')->only('index', 'show');
        $this->middleware('can:administrativos.create')->only('create', 'store', 'datas');
        $this->middleware('can:administrativos.edit')->only('edit', 'update');
    }
    
    public function index() {
        $admins = Administrativo::get();
        $admins->load('persona');
        return view('administrativo.index', compact('admins'));
    }

    public function create() {
        return view('administrativo.create');
    }

    public function store(StoreAdministrativoRequest $request) {
        
        //creacion de persona, administrativo y usuario
        AdministrativoAction::executeStore($request);
        //$admins = Administrativo::get();
        //$admins->load('persona');
        //return view('administrativo.index', compact('admins'));
        return redirect()->route('administrativos.index');
    }

    public function edit(Administrativo $administrativo) {
        return view('administrativo.edit', compact('administrativo'));
    }

    public function update(UpdateAdministrativoRequest $request, $id) {
        AdministrativoAction::executeUpdate($request, $id);
        return redirect()->route('administrativos.index');
    }


    public function datas($id){
        $admin = Administrativo::find($id);
        $admin->load('turno');
        $admin->load('persona');
        $admin->persona->load('telefonos');
        return $admin;
    }
    
    public function show(Administrativo $administrativo) {
        $telefonos = Telefono::whereid_persona($administrativo->id)->get();
        return view('administrativo.show', compact('administrativo', 'telefonos'));

    }


}
