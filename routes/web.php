<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\EmpleadoController;
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

Route::get('/', [SessionsController::class,'login']);

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/', [SessionsController::class, 'store'])->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

//Rutas de curso: Ruta de Lista
Route::get('/listaEmpleado', [EmpleadoController::class,'listaEmpleados']);

//Ruta de Formulario Guardar
Route::get('/formEmpleado', [EmpleadoController::class,'formEmpleado']);

//Ruta para Guardar al usuario
Route::post('/Empleado/empleados', [EmpleadoController::class,'saveEmpleado'])->name('Empleado.save');

//Ruta de Formulario Editar
Route::get('/editformEmpleado/{codigo_empleado}', [EmpleadoController::class,'editformEmpleado'])->name('editformEmpleado');

//Ruta para Editar
Route::patch('/editEmpleado/{codigo_empleado}', [EmpleadoController::class, 'editEmpleado'])->name('editEmpleado');

//Ruta para Eliminar
Route::delete('/deleteEmpleado/{codigo_empleado}', [EmpleadoController::class,'destroy'])->name('deleteEmpleado');

Route::get('/listaUsuarios', [EmpleadoController::class,'listaUsuarios']);

