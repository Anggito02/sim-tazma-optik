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

            // Frame
            $table->string('frame_sku_vendor')->nullable();
            $table->string('frame_sub_kategori')->nullable();
            $table->string('frame_kode')->nullable();
            $table->bigInteger('frame_harga_beli')->nullable();
            $table->bigInteger('frame_harga_jual')->nullable();

            // Lens
            $table->string('lensa_jenis_produk')->nullable();
            $table->string('lensa_jenis_lensa')->nullable();
            $table->bigInteger('lensa_harga_beli')->nullable();
            $table->bigInteger('lensa_harga_jual')->nullable();

            // Accessory
            $table->string('aksesoris_nama_item')->nullable();
            $table->string('aksesoris_kategori')->nullable();
            $table->bigInteger('aksesoris_harga_beli')->nullable();
            $table->bigInteger('aksesoris_harga_jual')->nullable();

            // Foreign Keys
            // FRAME //
            // Frame Category
            $table->foreignId('frame_frame_category_id')->nullable()->constrained('frame_categories')->onDelete('cascade')->onUpdate('cascade');

            // Frame Brand
            $table->foreignId('frame_brand_id')->nullable()->constrained('brands')->onDelete('cascade')->onUpdate('cascade');

            // Frame Vendor
            $table->foreignId('frame_vendor_id')->nullable()->constrained('vendors')->onDelete('cascade')->onUpdate('cascade');

            // Frame Color
            $table->foreignId('frame_color_id')->nullable()->constrained('colors')->onDelete('cascade')->onUpdate('cascade');

            // ========== //

            // LENS //
            // Lens Category
            $table->foreignId('lensa_lens_category_id')->nullable()->constrained('lens_categories')->onDelete('cascade')->onUpdate('cascade');

            // Lens Brand
            $table->foreignId('lensa_brand_id')->nullable()->constrained('brands')->onDelete('cascade')->onUpdate('cascade');

            // Lens Index
            $table->foreignId('lensa_index_id')->nullable()->constrained('indices')->onDelete('cascade')->onUpdate('cascade');

            // ========== //

            // ACCESSORY //
            // Accessory Brand
            $table->foreignId('aksesoris_brand_id')->nullable()->constrained('brands')->onDelete('cascade')->onUpdate('cascade');

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
