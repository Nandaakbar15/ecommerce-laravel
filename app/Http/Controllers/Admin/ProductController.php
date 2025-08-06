<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = [
            [
                'name_product' => 'Laptop ASUS ROG Ram 16gb AMD Ryzen 5 37000x NVDIA RTX 2060',
                'price' => 12000000,
                'quantity' => 13,
                'stock' => 50,
            ],
            [
                'name_product' => 'Playstation 5 White Digital Only',
                'price' => 7000000,
                'quantity' => 5,
                'stock' => 35,
            ],
            [
                'name_product' => 'Dualshock 4 Black SONY',
                'price' => 300000,
                'quantity' => 7,
                'stock' => 20,
            ],
        ];
        return view("admin.products.IndexProduct", [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
