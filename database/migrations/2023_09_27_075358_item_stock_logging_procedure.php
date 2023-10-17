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
            CREATE PROCEDURE IF NOT EXISTS item_stock_logging_procedure(
                IN tanggal_berubah DATETIME,
                IN stok_lama INT,
                IN stok_baru INT,
                IN bentuk_perubahan VARCHAR(255),
                IN item_id BIGINT,
                IN purchase_order_id BIGINT
            )
            BEGIN
                INSERT INTO item_stock_loggings (
                    tanggal_berubah,
                    stok_lama,
                    stok_baru,
                    bentuk_perubahan,
                    item_id,
                    purchase_order_id
                )
                VALUES (
                    tanggal_berubah,
                    stok_lama,
                    stok_baru,
                    bentuk_perubahan,
                    item_id,
                    purchase_order_id
                );
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `item_stock_logging_procedure`');
    }
};
