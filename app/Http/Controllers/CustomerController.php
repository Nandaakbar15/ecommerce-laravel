<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function home() {
        $title = "E-Commerce | Dashboard Customer";
        return view("customers.layouts.home", [
            "title" => $title
        ]);
    }

    public function listproducts() {
        $title = "E-Commerce | Our Products";
        return view("customers.products.listproduct", [
            "title" => $title
        ]);
    }

    public function listcarts() {
        $title = "E-Commerce | Carts";
        return view("customers.cart.listcarts", [
            "title" => $title
        ]);
    }
}
