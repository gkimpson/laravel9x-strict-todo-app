<?php

use App\Http\Controllers\TodoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/todos', [TodoApiController::class, 'index']);
// Route::get('/todos/{id}', [TodoApiController::class, 'show']);
// Route::post('/todos', [TodoApiController::class, 'store']);
// Route::put('todos/{id}', [TodoApiController::class, 'update']);
// Route::delete('todos/{id}', [TodoApiController::class, 'destroy']);

Route::apiResource('todos', TodoApiController::class);
