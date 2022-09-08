<?php

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
})->name('coveicydet.home');



//controlador para inicio de sesión

Route::get('coveicydet/login', [loginController::class, 'login'])->name('coveicydet.login');
Route::post('login', [loginController::class, 'compare'])->name('coveicydet.compare');
Route::get('logout', [loginController::class, 'destroy'])->name('coveicydet.destroy');

//controlador para el registro de usuario

Route::get('coveicydet/singup', [singupController::class, 'singup'])->name('coveicydet.singup');
Route::post('singup', [singupController::class, 'store'])->name('coveicydet.store');


//controlador para el formulario de la propuesta

Route::get('coveicydet/propuesta',[propuestaController::class,'propuesta'])->name('coveicydet.propuesta');
Route::post('coveicydet/registro/propuesta',[propuestaController::class,'store'])->name('coveicydet.propuesta.store');