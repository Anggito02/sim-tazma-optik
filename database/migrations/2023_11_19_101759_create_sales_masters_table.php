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
        Schema::create('sales_masters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ref_sales_id')->unsigned()->default(0);
            $table->string('nomor_transaksi', 50);
            $table->dateTime('tanggal_transaksi');
            $table->string('sistem_pembayaran', 50)->nullable();
            $table->string('nomor_kartu', 50)->nullable();
            $table->string('nomor_referensi', 50)->nullable();
            $table->double('dp')->nullable();
            $table->integer('total_tagihan')->default(0);
            $table->integer('potongan_manual')->default(0);
            $table->enum('status', ['DP', 'Lunas'])->nullable();
            $table->boolean('verified')->default(false);

            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('employee_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_masters');
    }
};
