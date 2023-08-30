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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('kode_vendor');
            $table->string('npwp_vendor');
            $table->string('nama_vendor');
            $table->string('alamat_vendor');
            $table->date('init_date_supply');
            $table->date('last_date_supply')->nullable();
            $table->string('pic_vendor');
            $table->string('no_telp_vendor');
            $table->string('no_telp_pic');
            $table->boolean('status_blacklist');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
