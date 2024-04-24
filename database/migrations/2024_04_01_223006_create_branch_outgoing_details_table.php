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
        Schema::create('branch_outgoing_details', function (Blueprint $table) {
            $table->id();
            $table->integer('delivered_qty');
            $table->dateTime('verified_at')->nullable();
            $table->boolean('verified_status')->default(false);

            // Foreign Keys
            // Branch Outgoing
            $table->foreignId('branch_outgoing_id')->constrained('branch_outgoings')->onUpdate('cascade')->onDelete('cascade');

            // Item
            $table->foreignId('item_id')->constrained('items')->onUpdate('cascade')->onDelete('cascade');

            // Branch
            $table->foreignId('branch_from_id')->constrained('branches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('branch_to_id')->constrained('branches')->onUpdate('cascade')->onDelete('cascade');

            // Employee
            $table->foreignId('verified_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_outgoing_details');
    }
};
