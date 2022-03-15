<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProjectController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

/* Route user */ 
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::get('/user/delete/{id}', [UserController::class, 'destroy']);
Route::post('/user/store', [UserController::class, 'store']);
Route::put('/user/update/{id}', [UserController::class, 'update']);

/* Route User Project */
Route::get('/user-project', [UserProjectController::class, 'index']);
Route::get('/user-project/create', [UserProjectController::class, 'create']);
Route::get('/user-project/edit/{id}', [UserProjectController::class, 'edit']);
Route::get('/user-project/delete/{id}', [UserProjectController::class, 'destroy']);
Route::post('/user-project/store', [UserProjectController::class, 'store']);
Route::put('/user-project/update/{id:id}', [UserProjectController::class, 'update']);

Route::get('/zone', [ZoneController::class, 'index']);
Route::get('/zone/create', [ZoneController::class, 'create']);
Route::get('/zone/edit/{id}', [ZoneController::class, 'edit']);
Route::get('/zone/delete/{id}', [ZoneController::class, 'destroy']);
Route::post('/zone/store', [ZoneController::class, 'store']);
Route::post('/zone/update/{id}', [ZoneController::class, 'update']);

Route::get('/level', [LevelController::class, 'index']);
Route::post('/level/store', [LevelController::class, 'store']);