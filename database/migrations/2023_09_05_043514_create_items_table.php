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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_item', ['frame', 'lensa', 'aksesoris']);
            $table->string('kode_item')->unique();
            $table->text('deskripsi');
            $table->integer('stok')->default(0);
            $table->bigInteger('harga_beli')->default(0);
            $table->bigInteger('harga_jual')->default(0);
            $table->float('diskon')->default(0);
            $table->string('qr_path')->nullable();
            $table->boolean('deleteable')->default(true);

            // Frame
            $table->string('frame_sku_vendor')->nullable();
            $table->string('frame_sub_kategori')->nullable();
            $table->string('frame_kode')->nullable();

            // Lens
            $table->string('lensa_jenis_produk')->nullable();
            $table->string('lensa_jenis_lensa')->nullable();

            // Accessory
            $table->string('aksesoris_nama_item')->nullable();

            // Foreign Keys
            // BRAND //
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade')->onUpdate('cascade');

            // VENDOR //
            $table->foreignId('vendor_id')->nullable()->constrained('vendors')->onDelete('cascade')->onUpdate('cascade');

            // CATEGORY //
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade')->onUpdate('cascade');

            // FRAME //
            // Frame Color
            $table->foreignId('frame_color_id')->nullable()->constrained('colors')->onDelete('cascade')->onUpdate('cascade');

            // LENS //
            // Lens Index
            $table->foreignId('lensa_index_id')->nullable()->constrained('indices')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
