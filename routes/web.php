<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("home");
});

Route::prefix("admin")->group(function() {
    Route::get("/products", function() {
        return view("admin.products.IndexProduct");
    });

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
