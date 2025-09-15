<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CustomerController extends Controller
{
    public function home() {
        $products = Product::paginate(5);
        $title = "NusaDigital | Dashboard Customer";
        return view("customers.layouts.home", [
            "title" => $title,
            'products' => $products
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

    public function click($id_produk) {
        $product = Product::findOrFail($id_produk);
        $product->click = $product->click + 1;
        $product->save();

        $no_wa = '6281818132011';

        $text = 'Halo, saya mau beli ' . $product->name . ' dengan jumlah ' . $product->stock . ' buah';

        $url = 'https://api.whatsapp.com/send?phone='.$no_wa.'&text='.urlencode($text);

        return redirect()->away($url);
    }
}
