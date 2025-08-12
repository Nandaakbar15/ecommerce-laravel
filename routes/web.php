<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view("home");
// });

Route::get('/', function() {
    return redirect('/admin/home');
});

Route::prefix("admin")->group(function() {

    Route::get('/home', [AdminController::class, 'home']);

    // route product admin
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/addnewproducts', [ProductController::class, 'create']);

    // route karyawan admin
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::get('/addnewkaryawan', [EmployeeController::class, 'create']);

});

Route::prefix("customer")->group(function() {
    Route::get("/home", [CustomerController::class, 'home']);

    Route::get('/listproducts', [CustomerController::class, 'listproducts']);

    Route::get('/carts', [CustomerController::class, 'listcarts']);
});
