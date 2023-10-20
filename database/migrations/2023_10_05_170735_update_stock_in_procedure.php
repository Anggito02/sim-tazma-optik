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
           CREATE PROCEDURE IF NOT EXISTS update_stock_in_procedure(
               IN kode_item VARCHAR(255),
               IN bulan INT,
               IN tahun INT,
               IN stok_in INT,
               IN item_id BIGINT
           )
           BEGIN
               UPDATE stock_in_logs
               SET
                   stok_total = stok_total + stok_in,
                   stok_in_total = stok_in
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
        DB::unprepared('DROP PROCEDURE IF EXISTS `update_stock_in_procedure`');
    }
};
