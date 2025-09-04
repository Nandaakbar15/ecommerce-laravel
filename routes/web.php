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
        // products dan dashboard admin
        Route::get('/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/create-products', [ProductController::class, 'create']);
        Route::post('/add-product', [ProductController::class, 'store']);
        Route::get('/edit-product/{product}', [ProductController::class, 'edit']);
        Route::put('/update-product/{product}', [ProductController::class, 'update']);
        Route::delete('/delete-product/{product}', [ProductController::class, 'destroy']);

        // employee
        Route::get('/employee', [EmployeeController::class, 'index']);
        Route::get('/createEmployee', [EmployeeController::class, 'create']);
        Route::post('/add-employee', [EmployeeController::class, 'store']);
        Route::get('/edit-employee/{employee}', [EmployeeController::class, 'edit']);

        // categories
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/create-categories', [CategoryController::class, 'create']);
        Route::post('/add-categories', [CategoryController::class, 'store']);
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    });
});

Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
