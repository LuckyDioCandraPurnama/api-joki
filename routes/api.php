<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ML_JokiPaketController;
use App\Http\Controllers\ML_JokiStarController;
use App\Http\Controllers\ML_JokiClasController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//STAR
// Route::get('get',[ML_JokiStarController::class, 'getAll']);
// Route::get('get/{id}',[ML_JokiStarController::class, 'getById']);

//PAKET
Route::get('paket',[ML_JokiPaketController::class, 'getPaket']);
Route::get('star',[ML_JokiStarController::class, 'getStar']);
Route::get('clas',[ML_JokiClasController::class, 'getClas']);

//JOKI PAKET
Route::get('rank-pack',[ML_JokiPaketController::class, 'getAll']);
Route::get('rank-pack/{id}',[ML_JokiPaketController::class, 'getById']);
Route::post('rank-pack',[ML_JokiPaketController::class, 'tambah']);

//JOKI STAR
Route::get('rank-star',[ML_JokiStarController::class, 'getAll']);
Route::get('rank-star/{id}',[ML_JokiStarController::class, 'getById']);
Route::post('rank-star',[ML_JokiStarController::class, 'tambah']);

//JOKI CLASSIC
Route::get('classic',[ML_JokiClasController::class, 'getAll']);
Route::get('classic/{id}',[ML_JokiClasController::class, 'getById']);
Route::post('classic',[ML_JokiClasController::class, 'tambah']);