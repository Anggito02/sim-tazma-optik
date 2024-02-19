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
        Schema::create('branch_item_stock_loggings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_berubah');
            $table->integer('stok_lama');
            $table->integer('stok_baru');
            $table->integer('jumlah_stok_berubah');
            $table->enum('bentuk_perubahan', ['penambahan', 'pengurangan']);
            $table->boolean('is_Adjustment')->default(false);

            // Foreign Keys
            // Branch Item
            $table->foreignId('branch_item_id')->constrained('branch_items')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_item_stock_loggings');
    }
};
