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
           CREATE PROCEDURE IF NOT EXISTS update_branch_stock_out_procedure(
               IN kode_item VARCHAR(255),
               IN bulan INT,
               IN tahun INT,
               IN last_stok_out_qty_branch INT,
               IN item_id BIGINT
           )
           BEGIN
               UPDATE branch_stock_out_logs
               SET
                    stok_total_branch = stok_total_branch + last_stok_out_qty_branch,
                    last_stok_out_qty_branch = last_stok_out_qty_branch
               WHERE
                    kode_item = kode_item AND
                    bulan = bulan AND
                    tahun = tahun AND
                    item_id = item_id;
           END;
         ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
