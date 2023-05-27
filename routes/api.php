<?php

// use App\Http\Controllers\DroneController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/users',UserController::class);
Route::resource('/roles',RoleController::class);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');




Route::post('/drone', [DroneController::class, 'store'])->middleware('auth:sanctum');
Route::get('/drones', [DroneController::class, 'index']);
Route::get('/drone/{name}', [DroneController::class, 'show']);

Route::resource('/maps',MapController::class);
Route::get('/getMapOfFarm/{province}/{id}',[MapController::class,"getMapOfFarm"]);
Route::delete('/deleteMapOfFarm/{province}/{id}',[MapController::class,"deleteMapOfFarm"]);

Route::post('/plan', [PlanController::class, 'store']);