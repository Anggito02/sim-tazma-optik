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
        Schema::create('vendor_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_invoice_vendor');
            $table->string('nomor_invoice_receive');
            $table->enum('iterasi_pembayaran', [1, 2, 3, 4]);
            // $table->string('bukti_pembayaran_1');
            $table->boolean('status_pembayaran_1');
            // $table->string('bukti_pembayaran_2')->nullable();
            $table->boolean('status_pembayaran_2')->nullable();
            // $table->string('bukti_pembayaran_3')->nullable();
            $table->boolean('status_pembayaran_3')->nullable();
            // $table->string('bukti_pembayaran_4')->nullable();
            $table->boolean('status_pembayaran_4')->nullable();
            $table->enum('status_pembayaran', ['lunas', 'belum_lunas']);

            // Foreign Key
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('purchase_order_id')->constrained('purchase_orders')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('receive_order_id')->constrained('receive_orders')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('accepted_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('checked_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_invoices');
    }
};
