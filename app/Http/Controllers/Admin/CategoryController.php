<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "E-Commerce | Data Kategori Admin";
        $categories = Category::paginate(5);

        return view('admin.category.IndexCategory', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "E-Commerce | Form tambah Kategori";
        return view("admin.category.TambahKategori", [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer'
        ]);

        Category::create($validateData);

        return redirect('/admin/categories')->with('success', 'Berhasil menambahkan kategori!');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $title = "E-Commerce | Form ubah Kategori";

        return view("admin.category.UbahKategori", [
            'title' => $title,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer'
        ]);

        $category->update($validateData);

        return redirect("admin/categories")->with('success', 'Berhasil mengubah kategori!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/categories')->with('delete', 'Berhasil menghapus data!');
    }
}
