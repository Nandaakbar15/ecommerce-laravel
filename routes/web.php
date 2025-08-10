<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view("home");
// });

Route::get('/', function() {
    return redirect('/admin/home');
});

Route::prefix("admin")->group(function() {

    Route::get('/home', [AdminController::class, 'home']);

    Route::get('/products', [ProductController::class, 'index']);

    Route::get("/carts", function() {
        return view("admin.cart.IndexCart");
    });

    Route::get("/checkout", function() {
        return view("admin.checkout.IndexCheckout");
    });

    Route::get("/orders", function() {
        return view("admin.orders.IndexOrder");
    });

});

Route::prefix("customer")->group(function() {
    Route::get("/home", [CustomerController::class, 'home']);

    Route::get('/listproducts', [CustomerController::class, 'listproducts']);

    Route::get('/carts', [CustomerController::class, 'listcarts']);
});
