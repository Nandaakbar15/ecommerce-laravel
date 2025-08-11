<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /** @use HasFactory<\Database\Factories\OrdersFactory> */
    protected $table = "orders";
    protected $primaryKey = "id_pesanan";
    protected $fillable = ['user_id', 'id_produk', 'quantity', 'total'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    use HasFactory;
}
