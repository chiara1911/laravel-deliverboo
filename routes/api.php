<?php
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\OrderController;

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

Route::get('/types', [TypeController::class, 'index']);
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{slug}', [RestaurantController::class, 'show']);

Route::get('/generate', [OrderController::class, 'generateToken']);
Route::post('/payment', [OrderController::class, 'payment']);
Route::post('/orders', [OrderController::class, 'store']);
