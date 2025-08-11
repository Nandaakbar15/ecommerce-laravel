<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    protected $table = "product";
    protected $primaryKey = "id_produk";
    protected $fillable = ['id_category', 'name', 'description', 'stock', 'image'];

    public function categories() {
        return $this->belongsTo(Category::class, 'id_kategori', 'id_kategori');
    }
    use HasFactory;
}
