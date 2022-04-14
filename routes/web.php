<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Adicionar o midleware auth às demais rotas no web.php
Route::group(['middleware' => ['auth']], function () {
	Route::get('/', function () {
        return view('home');
    })->name('home');
    
    Route::get('/usuarios', [UsuariosController::class, 'lista']);
    Route::get('/usuarios-add', [UsuariosController::class, 'add']);
    
    Route::get('/clientes', function() {
        return view('clientes');
    });
});