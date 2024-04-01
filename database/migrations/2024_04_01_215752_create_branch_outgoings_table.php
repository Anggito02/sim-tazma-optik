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
        Schema::create('branch_outgoings', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_branch_outgoing');
            $table->dateTime('tanggal_outgoing');
            $table->dateTime('tanggal_pengiriman');

            // Foreign Keys
            // Bracnh
            $table->foreignId('branch_from_id')->constrained('branches')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('branch_to_id')->constrained('branches')->onDelete('cascade')->onUpdate('cascade');

            // Employee
            $table->foreignId('known_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('checked_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('approved_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('delivered_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('received_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_outgoings');
    }
};
