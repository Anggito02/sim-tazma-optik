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
        Schema::create('branch_stock_in_logs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_item');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('stok_total_branch');
            $table->integer('last_stok_in_qty_branch');

            // Foreign Key
            // Item
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_stock_in_logs');
    }
};
