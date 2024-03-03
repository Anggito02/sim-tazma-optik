<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\Models\Modules\SalesMaster;

use App\DTO\Modules\SalesMasterDTOs\SalesMasterKasInDTO;

class GetAllSalesMasterKasInRepository {
    /**
     * Get Sales Master Kas In
     *
     * @param int $branch_id
     * @param int $page
     * @param int $limit
     * @return SalesMasterKasInDTO
     */
    public function getAllSalesMasterKasIn(int $branch_id, int $page, int $limit): array {
        try {
            $salesMaster = SalesMaster::where('sales_masters.branch_id', '=', $branch_id)
                ->join('branches', 'sales_masters.branch_id', '=', 'branches.id')
                ->join('users', 'sales_masters.employee_id', '=', 'users.id')
                ->select(
                    'sales_masters.id',
                    'sales_masters.nomor_transaksi',
                    'sales_masters.tanggal_transaksi',
                    'sales_masters.total_tagihan',
                    'branches.id as branch_id',
                    'branches.kode_branch',
                    'branches.nama_branch',
                    'users.id as sales_by',
                    'users.employee_name as sales_by_name'
                )
                ->where('sales_masters.verified', '=', 1)
                ->orderBy('sales_masters.id', 'desc')
                ->offset(($page - 1) * $limit)
                ->limit($limit)
                ->get();


            $salesMasterKasInDTOs= [];

            foreach ($salesMaster as $salesMasterKasIn) {
                $salesMasterKasInDTO = new SalesMasterKasInDTO(
                    $salesMasterKasIn->id,
                    $salesMasterKasIn->nomor_transaksi,
                    $salesMasterKasIn->tanggal_transaksi,
                    $salesMasterKasIn->total_tagihan,
                    $salesMasterKasIn->branch_id,
                    $salesMasterKasIn->kode_branch,
                    $salesMasterKasIn->nama_branch,
                    1,
                    '1001',
                    $salesMasterKasIn->sales_by,
                    $salesMasterKasIn->sales_by_name
                );

                array_push($salesMasterKasInDTOs, $salesMasterKasInDTO);
            }

            return $salesMasterKasInDTOs;
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>
