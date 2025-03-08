<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ApiPendidikanController;

/*
|----------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rute untuk autentikasi pengguna (jika menggunakan auth:sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rute API untuk Pendidikan
Route::get('api_pendidikan', [ApiPendidikanController::class, 'getAll']);
Route::get('api_pendidikan/{id}', [ApiPendidikanController::class, 'getPen']);
Route::post('api_pendidikan', [ApiPendidikanController::class, 'createPen']);
Route::put('api_pendidikan/{id}', [ApiPendidikanController::class, 'updatePen']);
Route::delete('api_pendidikan/{id}', [ApiPendidikanController::class, 'deletePen']);
