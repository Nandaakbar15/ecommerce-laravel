<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'home']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/addnewproducts', [ProductController::class, 'create']);
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/addnewcategories', [CategoryController::class, 'create']);
});

require __DIR__.'/auth.php';
