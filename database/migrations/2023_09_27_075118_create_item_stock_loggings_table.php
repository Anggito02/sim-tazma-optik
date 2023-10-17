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
        Schema::create('item_stock_loggings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_berubah');
            $table->integer('stok_lama');
            $table->integer('stok_baru');
            $table->enum('bentuk_perubahan', ['penambahan', 'pengurangan']);

            // Foreign Keys
            // Item
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade')->onUpdate('cascade');

            // Receive Order
            $table->foreignId('receive_order_id')->nullable()->constrained('receive_orders')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_stock_loggings');
    }
};
