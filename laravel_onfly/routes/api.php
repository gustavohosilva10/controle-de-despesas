<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpensesController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/user', [AuthController::class, 'show']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('/register_expenses', [ExpensesController::class, 'create']);
    Route::delete('/expenses/{id}', [ExpensesController::class, 'delete']);
    Route::put('/expenses', [ExpensesController::class, 'update']);
    Route::get('/expenses', [ExpensesController::class, 'show']);
});