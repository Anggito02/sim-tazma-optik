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
            CREATE PROCEDURE item_price_logging_procedure(
                IN tipe_harga_berubah VARCHAR(255),
                IN tanggal_berubah DATETIME,
                IN harga_lama BIGINT,
                IN harga_baru BIGINT,
                IN metode_perubahan VARCHAR(255),
                IN item_id BIGINT,
                IN purchase_order_id BIGINT
            )
            BEGIN
                INSERT INTO item_price_loggings (
                    tipe_harga_berubah,
                    tanggal_berubah,
                    harga_lama,
                    harga_baru,
                    metode_perubahan,
                    item_id,
                    purchase_order_id
                )
                VALUES (
                    tipe_harga_berubah,
                    tanggal_berubah,
                    harga_lama,
                    harga_baru,
                    metode_perubahan,
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
        DB::unprepared('DROP PROCEDURE IF EXISTS `item_price_logging_procedure`');
    }
};
