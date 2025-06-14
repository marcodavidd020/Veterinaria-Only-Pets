<?php

namespace App\Http\Controllers;

use App\Models\Accion;
use App\Models\Bitacora;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:bitacora')->only('index');
    }
    
    public function index(Request $request){
        // if($id == null){
           // $bitacoras = Bitacora::all()->orderby('id','desc');
            
            
            return view('bitacora.index');

        
    }

    public static function registrar($id_user, $accion, $descripción){
        Accion::create([
            'id_usuario' => $id_user,
            'accion' => $accion,
            'descripcion' => $descripción,
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'id_bitacora' => $id_user
        ]);
    }


    //get words of the string
    public function separateWords($string){
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9]+/i', ' ', $string);
        $string = trim($string);
        $string = preg_replace('/\s+/', ' ', $string);
        $string = explode(' ', $string);
        return $string;
    }

    //inverted words in a string
    public function invertedString($string){
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9]+/i', ' ', $string);
        $string = trim($string);
        $string = preg_replace('/\s+/', ' ', $string);
        $string = explode(' ', $string);
        $string = array_reverse($string);
        $string = implode(' ', $string);
        return $string;
    }


}
