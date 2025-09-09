<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function home() {
        $title = "E-Commerce | Admin";

        // Mengambil jumlah produk
        $jumlahProduk = Product::count();

        // Mengambil jumlah kategori produk
        $jumlahKategori = Category::count();

        // Mengamil jumlah klik produk
        $jumlahKlikProduk = Product::sum('click');


        return view("admin.layouts.home", [
            "title" => $title,
            'jumlahProduk' => $jumlahProduk,
            'jumlahKategori' => $jumlahKategori,
            'jumlahKlikProduk' => $jumlahKlikProduk
        ]);
    }
}
