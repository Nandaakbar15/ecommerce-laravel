<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "E-Commerce | Data Produk Admin";
        $products = Product::paginate(5);
        return view("admin.products.IndexProduct", [
            'title' => $title,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "E-Commerce | Form Tambah Data Produk";
        $categories = Category::all();
        return view("admin.products.TambahProducts", [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_kategori' => 'required|exists:product_category,id_kategori',
            'name' => 'required|string',
            'description' => 'required|string',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);

            $validateData['image'] = $filename;
        }

        Product::create($validateData);

        return redirect('/admin/products')->with('success', 'Berhasil menambahkan data produk!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $title = "E-Commerce | Form Ubah Data Produk";
        $categories = Category::all();
        return view("admin.products.UbahProduct", [
            'title' => $title,
            'categories' => $categories,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'id_kategori' => 'required|exists:product_category,id_kategori',
            'name' => 'required|string',
            'description' => 'required|string',
            'stock' => 'required|integer',
        ];

        // Tambahkan validasi untuk 'image' hanya jika ada file baru yang diunggah
        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpg,jpeg,png|max:2048';
        }

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete('images/' . $product->image);
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);

            $validatedData['image'] = $filename;
        }

        $product->update($validatedData);

        return redirect('/admin/products')->with('success', 'Berhasil mengubah data produk!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/products')->with('delete', 'Berhasil menghapus data!');
    }
}
