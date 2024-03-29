<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RestaurantController;
use Illuminate\Support\Facades\Route;
use App\Mail\GuestMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('dishes', DishController::class)->parameters([
        'dishes' => 'dish:id'
    ]);
    Route::get('/orders/stats', [OrderController::class, 'stats'])->name('orders.stats');
    Route::resource('orders', OrderController::class)->parameters([
        'orders' => 'order:id'
    ]);

    Route::post('/dishes/{id}', [DishController::class, 'restore'])->name('dishes.restore')->withTrashed();
    Route::resource('restaurants', RestaurantController::class)->parameters([
        'restaurants' => 'restaurant:id'
    ]);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::fallback(function () {
    return redirect()->route('admin.dashboard');
});

// rotta per editare email guest

// Route::get('/guest', function () {
//     return view('mail.guest-mail');
// });
