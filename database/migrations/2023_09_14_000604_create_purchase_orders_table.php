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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_po');
            $table->integer('qty');
            $table->string('unit');
            $table->integer('harga_beli_satuan');
            $table->integer('harga_jual_satuan');
            $table->double('diskon');
            $table->boolean('status_po');
            $table->boolean('status_penerimaan');
            $table->boleaan('status_pembayaran');

            // Foreign Keys
            // Vendor
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade')->onUpdate('cascade');

            // Item
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade')->onUpdate('cascade');

            // Employee
            $table->foreignId('made_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('checked_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('approved_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
