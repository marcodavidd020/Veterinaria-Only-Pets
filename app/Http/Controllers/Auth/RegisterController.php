<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Persona;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Usuario;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function showRegistrationForm()
    {
        return view('auth.login');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\Usuario,nombre_usuario'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user;
        try{
            
            DB::beginTransaction();
            
            $persona = Persona::create([
                'nombre' => $data['nombre'],
                'apellido_paterno' => $data['apellido_paterno'],
                'apellido_materno' => $data['apellido_materno'],
                'email' => $data['email'],
            ]);

            $cliente = Cliente::create([
                'id' => $persona->id,
            ]);
    
           $user = Usuario::create([
                'nombre_usuario' => $data['email'],
                'password' => Hash::make($data['password']),
                'enable' => true,
                'id_persona' => $persona->id,
            ])->assignRole('cliente');

            Bitacora::create([
                'descripcion' => 'Bitacora de '.$user->nombre.' '.$user->apellido_paterno.' '.$user->apellido_materno,
                'id_usuario' => $user->id
            ]);

            DB::commit();

        }catch(Exception $e){
            DB::rollBack();
            return back();
        }
        
     

        return $user;
    }
}
