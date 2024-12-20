<?php

use App\Http\Controllers\PinjamController;
use Illuminate\Support\Facades\Route;

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

Route::get('ruang',[PinjamController::class,'index']);
Route::post('ruang',[PinjamController::class,'store']);
Route::get('ruang/{id}',[PinjamController::class,'edit']);
Route::put('ruang/{id}',[PinjamController::class,'update']);
Route::delete('ruang/{id}',[PinjamController::class,'destroy']);

Route::prefix('api')->group(function () {
    require_once 'api.php';
});
