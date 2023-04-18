<?php

use App\Http\Controllers\StudentController;
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

Route::post('/student', [StudentController::class, 'create']);
Route::get('/students', [StudentController::class, 'index']);
Route::put('/student/{uuid}', [StudentController::class, 'update']);
Route::delete('/student/{uuid}', [StudentController::class, 'destroy']);