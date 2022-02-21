<?php

use App\Http\Controllers\CollectPerdinController;
use App\Http\Controllers\UserController;
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