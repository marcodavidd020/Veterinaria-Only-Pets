<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $productos = Producto::all();

        $puntos = [];

        foreach($productos as $producto){
            $puntos[] = ['name' => $producto['nombre'], 'y'=>$producto['cantidad']];
        }
        return view('home.index',["data" => json_encode($puntos)]);
    }
}
