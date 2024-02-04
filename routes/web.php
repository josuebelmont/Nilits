<?php

use App\Http\Controllers\alumnosContorller;
use App\Http\Controllers\asesoresController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\tutorController;
use Illuminate\Support\Facades\Route;

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

//Rutas de iniciao
Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::post('login',[loginController::class,'index'])->name('login');

Route::post('logout',[loginController::class,'logout'])->name('logout');



Route::get('/home', function(){
    return view('home.index');

})->name('/home');


Route::get('alumnos',[alumnosContorller::class,'index'])->name('alumnos');


Route::post('/alumnos/crear', [alumnosContorller::class, 'store'])->name('/alumnos/crear');

Route::post('/alumnos/{codigo}/edit', [alumnosContorller::class, 'edit'])->name('/alumnos/edit');




//ruta para mostrar alumnos sin tutor
Route::get('/alumnos/sintutor',[alumnosContorller::class,'alumno_sin_tutor'])->name('/alumnos/sintutor');

Route::put('/alumnos/asingnar/{codigo}',[alumnosContorller::class,'asignar_tutor'])->name('/alumnos/asingnar/');

//Ruta para el manejo de los maestros

Route::get('asesores',[asesoresController::class,'index'])->name('asesores');

Route::get('tutor', [tutorController::class,'index'])->name('tutor');

Route::get('gestionar-tutores', [asesoresController::class,'getionarT'])->name('gestionar-tutores');

Route::get('/maestros/tutorados/{maestroId}', [asesoresController::class,'getTutorados'])->name('/maestros/tutorados/');



//PDF controller

Route::get('/generar-oficio-asignacion', [PDFController::class, 'oficioAsignacion'])->name('oficio.asignacion');
Route::get('/generar-constancia-tutoria', [PDFController::class, 'constanciaTutoria'])->name('constancia.tutoria');
