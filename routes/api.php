<?php
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\RestaurantController;
use App\Models\Order;
use App\Http\Controllers\Api\Orders\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Dishes\DishController;

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
Route::get('dishes', [DishController::class, 'index']);
Route::get('orders/generate', [OrderController::class, 'generate']);
Route::post('orders/makePayment', [OrderController::class, 'makePayment']);



Route::get('/types', [TypeController::class, 'index']);
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{slug}', [RestaurantController::class, 'show']);
