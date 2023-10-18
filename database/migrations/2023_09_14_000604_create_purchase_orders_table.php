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
            $table->dateTime('tanggal_dibuat');
            $table->boolean('status_po');
            $table->boolean('status_penerimaan');
            $table->boolean('status_pembayaran');

            // Foreign Keys

            // Receive Order
            $table->foreignId('receive_order_id')->nullable()->constrained('receive_orders')->onDelete('cascade')->onUpdate('cascade');

            // Vendor
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade')->onUpdate('cascade');

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
