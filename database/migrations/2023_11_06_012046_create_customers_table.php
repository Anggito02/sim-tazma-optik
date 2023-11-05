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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan', 50)->nullable(false);
            $table->string('nama_belakang', 50)->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->string('nomor_telepon', 20)->nullable(false);
            $table->string('alamat', 100)->nullable(false);
            $table->string('kota', 50)->nullable(false);
            $table->integer('usia')->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->enum('gender', ['laki-laki', 'perempuan'])->nullable(false);

            // Foreign Key
            // Branch
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
