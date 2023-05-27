<?php

// use App\Http\Controllers\DroneController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Models\Location;
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

Route::middleware('auth:sanctum')->group(function () {
    // user 
    Route::resource('/users', UserController::class);
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    
    //Drones
    Route::post('/drone', [DroneController::class, 'store']);
    Route::put('/drone/{name}', [DroneController::class, 'update']);
    Route::get('/drone/{name}/location', [DroneController::class, 'ShowCurrent']);
    
    // Maps of farm
    Route::resource('/maps', MapController::class);
    Route::delete('/deleteMapOfFarm/{province}/{id}', [MapController::class, "deleteMapOfFarm"]);
    Route::post('/createMapOfFarm/{province}/{id}', [MapController::class, "createMapOfFarm"]);
    
    // Plan of drone
    Route::resource('/plans', PlanController::class);
    Route::get('/getPlaneByname/{name}', [PlanController::class, 'getPlaneByname']);

    //Instraction of drone
    Route::get('/instractions', [InstructionController::class, 'index']);
    Route::post('/instraction', [InstructionController::class, 'store']);
    Route::put('/runModeDrones/{id}', [InstructionController::class, 'runModeDrones']);

    //create location
    Route::post('/location', [LocationController::class, 'store']);
});

Route::resource('/roles', RoleController::class);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/drones', [DroneController::class, 'index']);
Route::get('/drone/{name}', [DroneController::class, 'show']);
Route::get('/getMapOfFarm/{province}/{id}', [MapController::class, "getMapOfFarm"]);
