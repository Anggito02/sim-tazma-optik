<?php

namespace App\Repositories\Modules\Pengeluaran;

use Exception;

use App\DTO\Modules\PengeluaranDTOs\NewPengeluaranDTO;

use App\Models\Modules\Pengeluaran;

class AddPengeluaranRepository {
    /**
     * Add new pengeluaran
     * @param NewPengeluaranDTO $newPengeluaranDTO
     * @return Pengeluaran
     */
    public function addPengeluaran(NewPengeluaranDTO $newPengeluaranDTO) {
        try {
            $pengeluaran = new Pengeluaran();
            $pengeluaran->deskripsi = $newPengeluaranDTO->getDeskripsi();
            $pengeluaran->jumlah_pengeluaran = $newPengeluaranDTO->getJumlahPengeluaran();
            $pengeluaran->tanggal_pengeluaran = $newPengeluaranDTO->getTanggalPengeluaran();

            $pengeluaran->coa_id = $newPengeluaranDTO->getCoaId();
            $pengeluaran->branch_id = $newPengeluaranDTO->getBranchId();
            $pengeluaran->made_by = $newPengeluaranDTO->getMadeBy();
            $pengeluaran->save();

            return $pengeluaran;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
