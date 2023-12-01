<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\OrderController;
use App\Models\Command;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('commands/{command}/summary', [CommandController::class, 'summary'])->name('commands.summary');
    Route::get('commands/{command}/checkout', [CommandController::class, 'checkout'])->name('commands.checkout');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::resource('commands', CommandController::class)->names('commands');
});


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return  "all cleared ...";

});
