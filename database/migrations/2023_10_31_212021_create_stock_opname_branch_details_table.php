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
        Schema::create('stock_opname_branch_details', function (Blueprint $table) {
            $table->id();
            $table->dateTime('so_start');
            $table->dateTime('so_end');
            $table->integer('actual_qty');
            $table->integer('system_qty');
            $table->integer('diff_qty');
            $table->integer('positive_diff_qty')->default(0);
            $table->integer('negative_diff_qty')->default(0);
            $table->dateTime('adjustment_date')->nullable();
            $table->enum('adjustment_status', ['OPEN', 'CLOSED'])->default('OPEN');
            $table->enum('adjustment_type', ['IN', 'OUT', 'NONE'])->default('NONE');
            $table->text('adjustment_followup_note')->nullable();

            $table->foreignId('branch_id')->constrained('branches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('items')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('open_by')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('close_by')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('adjustment_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('stock_opname_id')->constrained('stock_opname_branches')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_opname_branch_details');
    }
};
