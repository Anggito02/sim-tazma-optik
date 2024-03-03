<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function ($table) {
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('branches', function ($table) {
            $table->foreignId('employee_id_pic_branch')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function ($table) {
            $table->dropForeign(['branch_id']);
        });

        Schema::table('branches', function ($table) {
            $table->dropForeign(['employee_id_pic_branch']);
        });
    }
};
