<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\InquilinoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\InquilinoAlquilerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');



Route::resource('usuarios', UsuarioController::class);
Route::resource('paises', PaisController::class);
Route::resource('inquilinos', InquilinoController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('alquileres', AlquilerController::class);





#Route::prefix('usuarios')->group(function () {
#    Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
#    Route::get('create', [UsuarioController::class, 'create'])->name('usuarios.create');
#    Route::post('/', [UsuarioController::class, 'store'])->name('usuarios.store');
#    Route::get('{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
#    Route::get('{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
#    Route::put('{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
#    Route::delete('{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
#});#
#
#Rou#te::prefix('paises')->group(function () {
#   # Route::get('/', [PaisController::class, 'index'])->name('paises.index');
#   # Route::get('create', [PaisController::class, 'create'])->name('paises.create');
#   # Route::post('/', [PaisController::class, 'store'])->name('paises.store');
#   # Route::get('{pais}', [PaisController::class, 'show'])->name('paises.show');
#   # Route::get('{pais}/edit', [PaisController::class, 'edit'])->name('paises.edit');
#   # Route::put('{pais}', [PaisController::class, 'update'])->name('paises.update');
#    Route::delete('{pais}', [PaisController::class, 'destroy'])->name('paises.destroy');
#});
#

