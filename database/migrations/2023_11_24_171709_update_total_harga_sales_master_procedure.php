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
        DB::unprepared("
            CREATE PROCEDURE  update_total_harga_sales_master_procedure (
                IN sales_master_id BIGINT,
                IN jumlah_perubahan INT,
                IN tipe_perubahan ENUM('penambahan', 'pengurangan')
            )
            BEGIN
                DECLARE total_change INT;

                IF tipe_perubahan = 'penambahan' THEN
                    SET total_change = jumlah_perubahan;
                ELSEIF tipe_perubahan = 'pengurangan' THEN
                    SET total_change = -jumlah_perubahan;
                END IF;

                UPDATE sales_masters
                SET total_tagihan = total_tagihan + total_change
                WHERE id = sales_master_id;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `update_total_harga_sales_master_procedure`');
    }
};
