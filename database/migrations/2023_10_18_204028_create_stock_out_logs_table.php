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
        Schema::create('stock_out_logs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_item');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('stok_total');
            $table->integer('last_stok_out_qty');
            $table->timestamps();

            // Foreign Key
            // Item
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_out_logs');
    }
};
