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
            CREATE PROCEDURE IF NOT EXISTS branch_item_stock_logging_procedure(
                IN tanggal_berubah DATETIME,
                IN stok_lama INT,
                IN stok_baru INT,
                IN jumlah_stok_berubah INT,
                IN bentuk_perubahan VARCHAR(255),
                IN is_Adjustment BOOLEAN,
                IN branch_item_id BIGINT
            )
            BEGIN
                INSERT INTO branch_item_stock_loggings (
                    tanggal_berubah,
                    stok_lama,
                    stok_baru,
                    jumlah_stok_berubah,
                    bentuk_perubahan,
                    is_Adjustment,
                    branch_item_id
                )
                VALUES (
                    tanggal_berubah,
                    stok_lama,
                    stok_baru,
                    jumlah_stok_berubah,
                    bentuk_perubahan,
                    is_Adjustment,
                    branch_item_id
                );
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `branch_item_stock_logging_procedure`');
    }
};
