<?php

namespace App\Repositories\Modules\Kas;

use Exception;

use App\Models\Modules\Kas;

use App\DTO\Modules\KasDTOs\KasInfoDTO;

class GetLatestKasRepository {
    /**
     * Get Latest Kas
     * @param int $branch_id
     * @return KasInfoDTO | null
     */
    public function getLatestKas(int $branch_id) {
        try {
            $latestKas = Kas::where('kas.branch_id', $branch_id)
                ->join('branches', 'branches.id', '=', 'kas.branch_id')
                ->join('users', 'users.id', '=', 'kas.employee_id')
                ->select(
                    'kas.id',
                    'kas.tanggal_buka_kas',
                    'kas.tanggal_tutup_kas',
                    'kas.modal_tambahan_harian',
                    'kas.kas_awal_harian',
                    'kas.kas_akhir_harian',

                    'branches.id as branch_id',
                    'branches.kode_branch',
                    'branches.nama_branch',

                    'users.id as employee_id',
                    'users.employee_name as employee_name',
                )
            ->orderBy('tanggal_buka_kas', 'desc')
            ->first();

            if (!$latestKas) return null;

            $latestKasDTO = new KasInfoDTO(
                $latestKas->id,
                $latestKas->tanggal_buka_kas,
                $latestKas->tanggal_tutup_kas,
                $latestKas->modal_tambahan_harian,
                $latestKas->kas_awal_harian,
                $latestKas->kas_akhir_harian,

                $latestKas->branch_id,
                $latestKas->kode_branch,
                $latestKas->nama_branch,

                $latestKas->employee_id,
                $latestKas->employee_name,
            );

            return $latestKasDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
