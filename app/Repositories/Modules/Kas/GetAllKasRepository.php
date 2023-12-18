<?php

namespace App\Repositories\Modules\Kas;

use Exception;

use App\DTO\Modules\KasDTOs\KasInfoDTO;

use App\Models\Modules\Kas;

class GetAllKasRepository {
    /**
     * Get All Kas
     * @param int $branch_id
     * @param int $page
     * @param int $limit
     * @return KasInfoDTO[]
     */
    public function getAllKas(int $branch_id, int $page, int $limit) {
        try {
            $allKas = Kas::where('kas.branch_id', $branch_id)
                ->join('branches', 'branches.id', '=', 'kas.branch_id')
                ->join('users', 'users.id', '=', 'kas.employee_id')
                ->select(
                    'kas.id',
                    'kas.tanggal_buka_kas',
                    'kas.tanggal_tutup_kas',
                    'kas.modal_tambahan_harian',
                    'kas.kas_awal_harian',
                    'kas.kas_akhir_harian',
                    'kas.branch_id',
                    'kas.employee_id',

                    'branches.kode_branch',
                    'branches.nama_branch',

                    'users.employee_name as employee_name',
                )
            ->orderBy('tanggal_buka_kas', 'desc')
            ->paginate($limit, ['*'], 'page', $page);

            $allKasDTO = [];

            foreach ($allKas as $kas) {
                $kasDTO = new KasInfoDTO(
                    $kas->id,
                    $kas->tanggal_buka_kas,
                    $kas->tanggal_tutup_kas,
                    $kas->modal_tambahan_harian,
                    $kas->kas_awal_harian,
                    $kas->kas_akhir_harian,

                    $kas->branch_id,
                    $kas->kode_branch,
                    $kas->nama_branch,

                    $kas->employee_id,
                    $kas->employee_name,
                );

                array_push($allKasDTO, $kasDTO);
            }

            return $allKasDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
