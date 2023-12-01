<?php

use App\Http\Controllers\Admin\CashController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Command\CommandController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StorageController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('dashboard');

Route::get('cashes/summary', [CashController::class, 'summary'])->name('cashes.summary');

Route::resource('users', UserController::class)->names('users');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('products', ProductController::class)->names('products');

Route::resource('categories', CategoryController::class)->names('categories');

Route::resource('cashes', CashController::class)->names('cashes');

Route::resource('tables', TableController::class)->names('tables');

Route::resource('commands', CommandController::class)->names('commands');

Route::resource('storage', StorageController::class)->names('storage');

