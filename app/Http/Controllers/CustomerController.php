<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CustomerController extends Controller
{
    public function home() {
        $title = "E-Commerce | Dashboard Customer";
        return view("customers.layouts.home", [
            "title" => $title
        ]);
    }

    public function listproducts() {
        $products = Product::paginate(5);
        $title = "E-Commerce | Our Products";
        return view("customers.products.listproduct", [
            "title" => $title,
            "products" => $products
        ]);
    }

    public function listcarts() {
        $title = "E-Commerce | Carts";
        return view("customers.cart.listcarts", [
            "title" => $title
        ]);
    }

    public function detailProducts(Product $product) {
        return view("customers.products.detailProduct", [
            "product" => $product
        ]);
    }
}
