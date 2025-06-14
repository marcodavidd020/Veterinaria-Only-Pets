<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.create')->only('create', 'store');
        $this->middleware('can:roles.edit')->only('edit', 'update');
        $this->middleware('can:roles.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $roles = Role::paginate(10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $usuarios = Permission::where('name', 'LIKE', 'usuarios.%')->orderBy('id', 'asc')->get();
        $administrativos = Permission::where('name', 'LIKE', 'administrativos.%')->orderBy('id', 'asc')->get();
        $veterinarios = Permission::where('name', 'LIKE', 'veterinarios.%')->orderBy('id', 'asc')->get();
        $clientes = Permission::where('name', 'LIKE', 'clientes.%')->orderBy('id', 'asc')->get();
        $mascotas = Permission::where('name', 'LIKE', 'mascotas.%')->orderBy('id', 'asc')->get();
        $vacunas = Permission::where('name', 'LIKE', 'vacunas.%')->orderBy('id', 'asc')->get();
        $cirugias = Permission::where('name', 'LIKE', 'cirugias.%')->orderBy('id', 'asc')->get();
        $enfermedades = Permission::where('name', 'LIKE', 'enfermedades.%')->orderBy('id', 'asc')->get();
        $historiales = Permission::where('name', 'LIKE', 'historiales.%')->orderBy('id', 'asc')->get();
        $servicios = Permission::where('name', 'LIKE', 'servicios.%')->orderBy('id', 'asc')->get();
        $cita_servicio = Permission::where('name', 'LIKE', 'cita-servicio.%')->orderBy('id', 'asc')->get();
        $turnos = Permission::where('name', 'LIKE', 'turnos.%')->orderBy('id', 'asc')->get();
        $bitacora = Permission::where('name', 'LIKE', 'bitacora')->orderBy('id', 'asc')->get();
        $roles = Permission::where('name', 'LIKE', 'roles.%')->orderBy('id', 'asc')->get();
        $proveedores =  Permission::where('name', 'LIKE', 'proveedores.%')->orderBy('id', 'asc')->get();
        $productos =  Permission::where('name', 'LIKE', 'productos.%')->orderBy('id', 'asc')->get();
        $categorias =  Permission::where('name', 'LIKE', 'categorias.%')->orderBy('id', 'asc')->get();

        $datos = [ 
                    'clientes'=> $clientes,
                    'mascotas' => $mascotas,
                    'administrativos' => $administrativos,
                    'veterinarios' => $veterinarios];

        $usuario = ['usuarios' => $usuarios];
        $historial_clinico = ['enfermedades' => $enfermedades, 
                                'historiales clinicos' => $historiales,
                                'vacunas' => $vacunas,
                                'cirugias' => $cirugias];
        $servicio =['servicios' => $servicios,
                    'cita-servicio' => $cita_servicio,
                    'turnos' => $turnos];

        $shop = ['proveedores' => $proveedores,
                    'productos' => $productos,
                    'categorias' => $categorias];
        $bitacora = ['bitacora' => $bitacora];
        $roles = ['roles' => $roles];
        $permissions = ['datos' => $datos,
                        'usuario' => $usuario,
                        'historial-clinico' => $historial_clinico,
                        'servicio' => $servicio,
                        'pet-shop' => $shop,
                        'bitacora' => $bitacora,
                        'roles' => $roles];
      

       


        // return $permissions;
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        
        return  redirect()->route('roles.index')->with('success', 'Rol creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $usuarios = Permission::where('name', 'LIKE', 'usuarios.%')->orderBy('id', 'asc')->get();
        $administrativos = Permission::where('name', 'LIKE', 'administrativos.%')->orderBy('id', 'asc')->get();
        $veterinarios = Permission::where('name', 'LIKE', 'veterinarios.%')->orderBy('id', 'asc')->get();
        $clientes = Permission::where('name', 'LIKE', 'clientes.%')->orderBy('id', 'asc')->get();
        $mascotas = Permission::where('name', 'LIKE', 'mascotas.%')->orderBy('id', 'asc')->get();
        $vacunas = Permission::where('name', 'LIKE', 'vacunas.%')->orderBy('id', 'asc')->get();
        $cirugias = Permission::where('name', 'LIKE', 'cirugias.%')->orderBy('id', 'asc')->get();
        $enfermedades = Permission::where('name', 'LIKE', 'enfermedades.%')->orderBy('id', 'asc')->get();
        $historiales = Permission::where('name', 'LIKE', 'historiales.%')->orderBy('id', 'asc')->get();
        $servicios = Permission::where('name', 'LIKE', 'servicios.%')->orderBy('id', 'asc')->get();
        $cita_servicio = Permission::where('name', 'LIKE', 'cita-servicio.%')->orderBy('id', 'asc')->get();
        $turnos = Permission::where('name', 'LIKE', 'turnos.%')->orderBy('id', 'asc')->get();
        $bitacora = Permission::where('name', 'LIKE', 'bitacora')->orderBy('id', 'asc')->get();
        $roles = Permission::where('name', 'LIKE', 'roles.%')->orderBy('id', 'asc')->get();
        $proveedores =  Permission::where('name', 'LIKE', 'proveedores.%')->orderBy('id', 'asc')->get();
        $productos =  Permission::where('name', 'LIKE', 'productos.%')->orderBy('id', 'asc')->get();
        $categorias =  Permission::where('name', 'LIKE', 'categorias.%')->orderBy('id', 'asc')->get();

        $datos = [ 
                    'clientes'=> $clientes,
                    'mascotas' => $mascotas,
                    'administrativos' => $administrativos,
                    'veterinarios' => $veterinarios];

        $usuario = ['usuarios' => $usuarios];
        $historial_clinico = ['enfermedades' => $enfermedades, 
                                'historiales clinicos' => $historiales,
                                'vacunas' => $vacunas,
                                'cirugias' => $cirugias];
        $servicio =['servicios' => $servicios,
                    'cita-servicio' => $cita_servicio,
                    'turnos' => $turnos];

        $shop = ['proveedores' => $proveedores,
                    'productos' => $productos,
                    'categorias' => $categorias];
        $bitacora = ['bitacora' => $bitacora];
        $roles = ['roles' => $roles];
        $permissions = ['datos' => $datos,
                        'usuario' => $usuario,
                        'historial-clinico' => $historial_clinico,
                        'servicio' => $servicio,
                        'pet-shop' => $shop,
                        'bitacora' => $bitacora,
                        'roles' => $roles];
      

       return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'Rol actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $role = Role::findOrFail($id);
        if(!empty(Usuario::role($role)->get()))
            return redirect()->route('roles.index')->with('error', 'No se puede eliminar el rol porque tiene usuarios asignados');
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado con éxito');
    }
}
