<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\propuestaController;
use App\Http\Controllers\singupController;
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

Route::get('/', function () {
    return view('screens.home');
})->name('proveicydet.home');



//controlador para inicio de sesión

Route::get('proveicydet/login', [loginController::class, 'login'])->name('proveicydet.login');
Route::post('login', [loginController::class, 'compare'])->name('proveicydet.compare');
Route::get('logout', [loginController::class, 'destroy'])->name('proveicydet.destroy');

//controlador para el registro de usuario

Route::get('proveicydet/singup', [singupController::class, 'singup'])->name('proveicydet.singup');
Route::post('singup', [singupController::class, 'store'])->name('proveicydet.store');

//controller para el inicio
Route::get('proveicydet/inicio',[homeController::class, 'inicio'])->name('proveicydet.inicio');

//controlador para el formulario de la propuesta

Route::get('proveicydet/propuesta',[propuestaController::class,'propuesta'])->name('proveicydet.propuesta');
Route::get('proveicydet/editPropuesta/{id}',[propuestaController::class,'edit'])->name('proveicydet.propuesta.edit');
Route::put('proveicydet/update/{id}',[propuestaController::class,'update'])->name('proveicydet.propuesta.update');
Route::post('proveicydet/registro/propuesta',[propuestaController::class,'store'])->name('proveicydet.propuesta.store');