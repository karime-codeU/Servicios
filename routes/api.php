<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/saludo', function(){
    echo json_encode("Hola desde mi primer api rest");
});

Route::get('get/generos', [ApiController::class,'obtenerGeneros'])->name('obtener.generos');
Route::get('get/registros', [ApiController::class,'mostrarRegistros'])->name('mostrar.generos');
Route::get('/get/genero/{id}', [ApiController::class,'obtenerGenero'])->name('obtener.genero');

