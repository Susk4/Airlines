<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
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

Route::get('/users', [ApiController::class, 'getUsers']);
Route::get('/flights', [FlightController::class, 'index']);
Route::get('/flights/{id}', [FlightController::class, 'show']);
Route::post('/tickets', [TicketController::class, 'store']);
