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
        Schema::create('customer_diagnoses', function (Blueprint $table) {
            $table->id();
            $table->datetime('tanggal_diagnosa')->nullable(false);
            $table->string('keluhan', 100)->nullable(false);

            $table->string('visus_tanpa_koreksi_R')->nullable();
            $table->string('visus_tanpa_koreksi_L')->nullable();

            $table->string('oculus_dextra_sph_R')->nullable();
            $table->string('oculus_dextra_cyl_R')->nullable();
            $table->string('axis_R')->nullable();
            $table->string('oculus_dextra_add_R')->nullable();
            $table->string('oculus_dextra_visus_R')->nullable();

            $table->string('oculus_sinistra_sph_L')->nullable();
            $table->string('oculus_sinistra_cyl_L')->nullable();
            $table->string('axis_L')->nullable();
            $table->string('oculus_sinistra_add_L')->nullable();
            $table->string('oculus_sinistra_visus_L')->nullable();
            $table->string('PD')->nullable();

            $table->string('diagnosa')->nullable();
            $table->text('catatan')->nullable();

            // Foreign Key
            // Customer
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');

            // Branch
            $table->foreignId('branch_check_location_id')->constrained('branches')->onDelete('cascade')->onUpdate('cascade');

            // Employee
            $table->foreignId('diagnosed_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_diagnoses');
    }
};
