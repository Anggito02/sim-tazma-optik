<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE PROCEDURE IF NOT EXISTS add_branch_stock_out_procedure(
                IN kode_item VARCHAR(255),
                IN bulan INT,
                IN tahun INT,
                IN last_stok_out_qty_branch INT,
                IN item_id BIGINT
            )
            BEGIN
                INSERT INTO branch_stock_out_logs (
                    kode_item,
                    bulan,
                    tahun,
                    stok_total_branch,
                    last_stok_out_qty_branch,
                    item_id
                )
                VALUES (
                    kode_item,
                    bulan,
                    tahun,
                    last_stok_out_qty_branch,
                    last_stok_out_qty_branch,
                    item_id
                );
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `add_branch_stock_out_procedure`');
    }
};
