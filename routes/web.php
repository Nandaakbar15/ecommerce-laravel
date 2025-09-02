<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/addnewproducts', [ProductController::class, 'create']);
        Route::get('/employee', [EmployeeController::class, 'index']);
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/addnewcategories', [CategoryController::class, 'create']);
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    });
});

Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
