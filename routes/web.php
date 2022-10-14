<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HorarioController;

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

Route::get('/', function () {
    return view('login');
});


Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/salir', [AuthController::class, 'logout'])->name('salir');



// Route::middleware(['web'])->group(function () {
    
// });

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/clientes',  [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes');
Route::get('/clientes-create',  [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes-create');
Route::post('/clientes-store',  [App\Http\Controllers\ClienteController::class, 'store'])->name('clientes-store');

Route::get('/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleados');
Route::get('/empleados-create', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleados-create');
Route::post('/empleados-store',  [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleados-store');

Route::get('/motos',  [App\Http\Controllers\MotoController::class, 'index'])->name('motos');
Route::get('/moto-create',  [App\Http\Controllers\MotoController::class, 'create'])->name('moto-create');
Route::post('/moto-store',  [App\Http\Controllers\MotoController::class, 'store'])->name('moto-store');

Route::get('/categorias',  [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias');
Route::get('/categoria-create',  [App\Http\Controllers\CategoriaController::class, 'create'])->name('categoria-create');
Route::post('/categoria-store',  [App\Http\Controllers\CategoriaController::class, 'store'])->name('categoria-store');

Route::get('/horarios',  [App\Http\Controllers\HorarioController::class, 'index'])->name('horarios');

