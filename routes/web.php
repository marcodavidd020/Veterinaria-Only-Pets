<?php

use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CirugiaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleHistorialController;
use App\Http\Controllers\EnfermedadController;
use App\Http\Controllers\HistorialClinicoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudServicioController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\VeterinarioController;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\NotaIngresoController;
use App\Models\DetalleHistorial;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\View\Components\Forms\MascotaInput;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();



Route::get('/', [LoginController::class, 'showLoginForm']);



/*Route::get('/register', function () {
    return view('register');
});*/



Route::get('', function () {
    return view('inicio');
});



Route::get('/shop', function () {
    return view('shop.index');
});

Route::get('/petshop', function () {
    return view('petshop');
})->name('petshop');

Route::middleware('auth')->group(function(){

    Route::get('/home', [HomeController::class,'index']);
    
    Route::get('/datos', function () {
        return view('datos');
    })->name('datos');
    
    Route::get('/historialClinico', function () {
        return view('historialClinico');
    })->name('historialClinico');
    
    Route::get('/servicio', function () {
        return view('servicio');
    })->name('servicio');
    

Route::resource('usuarios', UsuarioController::class);

Route::get('mascotas/datas/{id}', [MascotaController::class, 'datas'])->name('mascotas.datas');
Route::get('mascotas/my', [MascotaController::class, 'myPets'])->name('mascotas.my');
Route::resource('mascotas', MascotaController::class);

Route::get('veterinarios/datas/{id}', [VeterinarioController::class, 'datas']);
Route::resource('veterinarios', VeterinarioController::class);

Route::get('administrativos/datas/{id}', [AdministrativoController::class, 'datas']);
Route::resource('administrativos', AdministrativoController::class);


Route::get('clientes/datas/{id}', [ClienteController::class, 'datas']);
Route::resource('clientes', ClienteController::class);

Route::get('vacunas/datas/{id}', [VacunaController::class, 'datas']);
Route::resource('vacunas', VacunaController::class);

Route::get('cirugias/datas/{id}', [CirugiaController::class, 'datas']);
Route::resource('cirugias', CirugiaController::class);

Route::get('enfermedades/datas/{id}', [EnfermedadController::class, 'datas']);
Route::resource('enfermedades', EnfermedadController::class);

Route::get('historiales/datas/{id}', [HistorialClinicoController::class, 'datas']);
Route::resource('historiales', HistorialClinicoController::class);
Route::get('bitacoras', [BitacoraController::class, 'index'])->name('bitacoras.index');


Route::get('servicios/datas/{id}', [ServicioController::class, 'datas']);
Route::resource('servicios', ServicioController::class);

Route::get('categorias/datas/{id}', [categoriaController::class, 'datas']);
Route::resource('categorias', categoriaController::class);

Route::get('solicitudes/datas/{id}', [SolicitudServicioController::class, 'datas']);
Route::resource('solicitudes', SolicitudServicioController::class);

Route::get('turnos/datas/{id}', [TurnoController::class, 'datas']);
Route::resource('turnos', TurnoController::class);

Route::resource('diagnosticos', DetalleHistorialController::class);

Route::get('proveedores/datas/{id}', [ProveedorController::class, 'datas']);
Route::resource('proveedores', ProveedorController::class);


Route::get('productos/datas/{id}', [ProductoController::class, 'datas']);
Route::post('productos/comprar', [ProductoController::class, 'comprar'])->name('productos.comprar');
Route::post('productos/vender', [ProductoController::class, 'vender'])->name('productos.vender');
Route::resource('productos', ProductoController::class);

Route::resource('roles',RoleController::class);

Route::get('solicitudes/pdf/{id}', [SolicitudServicioController::class,'pdf'])->name('solicitudes.pdf');
Route::get('historiales/pdf/{id}', [HistorialClinicoController::class,'pdf'])->name('historiales.pdf');

Route::get('compras/datas/{id}', [NotaIngresoController::class, 'datas']);
Route::resource('compras', NotaIngresoController::class);

Route::get('ventas/datas/{id}', [DetalleVentaController::class, 'datas']);
Route::resource('ventas', DetalleVentaController::class);
Route::get('ventas/pdf/{id}', [DetalleVentaController::class,'pdf'])->name('ventas.pdf');


});

