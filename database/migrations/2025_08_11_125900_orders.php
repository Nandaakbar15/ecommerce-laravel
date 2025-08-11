<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id("id_pesanan");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("id_produk");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("id_produk")->references("id_produk")->on("product");
            $table->integer("quantity");
            $table->decimal("total", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
