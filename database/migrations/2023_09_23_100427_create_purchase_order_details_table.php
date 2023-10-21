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
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('pre_order_qty');
            $table->integer('received_qty')->nullable();
            $table->integer('not_good_qty')->nullable();
            $table->string('unit');
            $table->bigInteger('harga_beli_satuan');
            $table->bigInteger('harga_jual_satuan');
            $table->double('diskon');

            // Foreign Keys
            // Purchase Order
            $table->foreignId('purchase_order_id')->constrained('purchase_orders')->onDelete('cascade')->onUpdate('cascade');

            // Receive Order
            $table->foreignId('receive_order_id')->nullable()->constrained('receive_orders')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('purchase_order_details');
    }
};
