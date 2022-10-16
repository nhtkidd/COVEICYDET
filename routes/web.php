<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\propuestaController;
use App\Http\Controllers\singupController;
use App\Http\Controllers\resetController;
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
//Route::get('proveicydet/annexes',[propuestaController::class,'annexes'])->name('proveicydet.propuesta.annexes');
Route::put('proveicydet/update/{id}',[propuestaController::class,'update'])->name('proveicydet.propuesta.update');
Route::get('proveicydet/propuesta/mostrar/{id}',[propuestaController::class,'mostrar'])->name('proveicydet.propuesta.mostrar');
Route::post('proveicydet/registro/propuesta',[propuestaController::class,'store'])->name('proveicydet.propuesta.store');


// ADMIN

Route::get('proveicydet/admin',[adminController::class,'index'])->middleware('auth.admin')->name('proveicydet.admin');
Route::get('proveicydet/admin/users',[adminController::class,'crudUser'])->middleware('auth.admin')->name('proveicydet.admin.users');

Route::get('proveicydet/admin/proposals',[adminController::class,'proposal'])->middleware('auth.admin')->name('proveicydet.admin.proposal');
Route::get('proveicydet/admin/accepted',[adminController::class,'proposalAccepted'])->middleware('auth.admin')->name('proveicydet.admin.aceptado');
Route::get('proveicydet/admin/refused',[adminController::class,'proposalRefused'])->middleware('auth.admin')->name('proveicydet.admin.rechazado');

Route::get('proveicydet/admin/{id}/view-proposal',[adminController::class,'view'])->middleware('auth.admin')->name('proveicydet.admin.view');
Route::put('proveicydet/admin/{id}/update',[adminController::class,'validateProposal'])->middleware('auth.admin')->name('proveicydet.admin.proposal-update');
Route::get('proveicydet/admin/create-user',[adminController::class,'create'])->middleware('auth.admin')->name('proveicydet.admin.create');
Route::get('proveicydet/admin/{id}/editar-user',[adminController::class,'editar'])->middleware('auth.admin')->name('proveicydet.admin.editar');
Route::put('proveicydet/admin/{id}/update-user',[adminController::class,'update'])->middleware('auth.admin')->name('proveicydet.admin.update');
Route::delete('proveicydet/admin/{id}/delete-user',[adminController::class,'delete'])->middleware('auth.admin')->name('proveicydet.admin.delete');




// RECUPERAR CONTRASEÑA
Route::get('proveicydet/email', [resetController::class, 'email'])->name('proveicydet.email');
Route::post('enlace', [resetController::class, 'enlace'])->name('proveicydet.enlace');
Route::get('proveicydet/clave/{token}', [resetController::class, 'clave'])->name('proveicydet.clave');
Route::post('cambiar', [resetController::class, 'cambiar'])->name('proveicydet.cambiar');