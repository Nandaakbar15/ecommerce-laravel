<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    protected $table = "product_category";
    protected $primaryKey = "id_kategori";
    protected $fillable = ['name', 'quantity'];

    public function products() {
        return $this->hasMany(Product::class, 'id_produk', 'id_produk');
    }
    use HasFactory;
}
