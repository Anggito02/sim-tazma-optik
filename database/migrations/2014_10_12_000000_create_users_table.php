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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('employee_name');
            $table->string('nik')->unique();
            $table->string('photo')->nullable();
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->text('address');
            $table->string('phone')->unique();
            $table->string('department');
            $table->string('section');
            $table->string('position');
            $table->string('role')->default('user');
            $table->string('group');
            $table->string('domicile');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
