<?php

namespace App\Repositories\Modules\Pengeluaran;

use Exception;

use App\DTO\Modules\PengeluaranDTOs\PengeluaranInfoDTO;

use App\Models\Modules\Pengeluaran;

class GetAllPengeluaranRepository {
    /**
     * Get All Pengeluaran
     * @return PengeluaranInfoDTO[]
     */
    public function getAllPengeluaran(): array {
        try {
            $pengeluaran = Pengeluaran::join('coas', 'coas.id', '=', 'pengeluarans.coa_id')
                ->join('branches', 'branches.id', '=', 'pengeluarans.branch_id')
                ->join('users', 'users.id', '=', 'pengeluarans.made_by')
                ->select(
                    'pengeluarans.id as id',
                    'pengeluarans.deskripsi as deskripsi',
                    'pengeluarans.tanggal_pengeluaran as tanggal_pengeluaran',
                    'pengeluarans.jumlah_pengeluaran as jumlah_pengeluaran',

                    'pengeluarans.coa_id as coa_id',
                    'coas.kode_coa as kode_coa',

                    'pengeluarans.branch_id as branch_id',
                    'branches.kode_branch as kode_branch',
                    'branches.nama_branch as nama_branch',

                    'pengeluarans.made_by as made_by',
                    'users.employee_name as made_by_name',
                )
                ->get();

            $pengeluaranInfoDTOs = [];

            foreach ($pengeluaran as $pengeluaran) {
                $pengeluaranInfoDTOs[] = new PengeluaranInfoDTO(
                    $pengeluaran->id,
                    $pengeluaran->deskripsi,
                    $pengeluaran->tanggal_pengeluaran,
                    $pengeluaran->jumlah_pengeluaran,

                    $pengeluaran->coa_id,
                    $pengeluaran->kode_coa,

                    $pengeluaran->branch_id,
                    $pengeluaran->kode_branch,
                    $pengeluaran->nama_branch,

                    $pengeluaran->made_by,
                    $pengeluaran->made_by_name,
                );
            }

            return $pengeluaranInfoDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
