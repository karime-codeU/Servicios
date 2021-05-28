<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ApiController;

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
    return view('welcome');
});

Route::get('/generos', [ApiController::class,'obtenerGeneros'])->name('obtener.generos');

Route::get('/registros', [ApiController::class,'mostrarRegistros'])->name('mostrar.registros');