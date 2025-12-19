<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // Relasi ke orders
            $table->foreignId('order_id')
                ->constrained('orders')
                ->cascadeOnDelete();

            // Relasi ke products
            // Produk tidak boleh dihapus jika sudah ada di order
            $table->foreignId('product_id')
                ->constrained('products')
                ->restrictOnDelete();

            // Snapshot data produk saat order
            $table->string('product_name');
            $table->decimal('price', 12, 2);
            $table->unsignedInteger('quantity');
            $table->decimal('subtotal', 15, 2);

            $table->timestamps();

            // Optional: index tambahan untuk performa
            $table->index(['order_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
