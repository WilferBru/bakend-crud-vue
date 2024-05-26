<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudianteController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource("v1/estudiantes", EstudianteController::class);

Route::apiResource("v1/cursos", CursoController::class);

Route::apiResource("v1/usuarios", UserController::class);
