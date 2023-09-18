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
        Schema::create('receive_orders', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_receive_order');
            $table->integer('receive_qty');
            $table->integer('not_good_qty');
            $table->date('tanggal_penerimaan');
            $table->boolean('status_invoice');

            // Foreign Keys
            // Purchase Order
            $table->foreignId('purchase_order_id')->constrained('purchase_orders')->onDelete('cascade')->onUpdate('cascade');

            // Employee
            $table->foreignId('received_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('receive_orders');
    }
};
