<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\Models\Modules\SalesMaster;

use App\DTO\Modules\SalesMasterDTOs\SalesMasterInfoDTO;

class GetAllSalesMasterRepository {
    /**
     * Get All Sales Master
     * @param int $page
     * @param int $limit
     * @param ?int $branch_id
     * @param ?int $nomor_transaksi
     * @return SalesMasterInfoDTO[]
     */
    public function getAllSalesMaster(int $page, int $limit, ?int $branch_id, ?string $nomor_transaksi) {
        try {
            $branch_filter = $branch_id === null || $branch_id == 1 ? "" : "sales_masters.branch_id = $branch_id";

            $nomor_transaksi_filter = $nomor_transaksi === null ? "" : "sales_masters.nomor_transaksi = '$nomor_transaksi'";

            $salesMasters = SalesMaster::whereRaw($branch_filter ? $branch_filter : 1)
                ->whereRaw($nomor_transaksi_filter ? $nomor_transaksi_filter : 1)
                ->join('branches', 'sales_masters.branch_id', '=', 'branches.id')
                ->join('users', 'sales_masters.employee_id', '=', 'users.id')
                ->leftJoin('customers', 'sales_masters.customer_id', '=', 'customers.id')
                ->select(
                    'sales_masters.id',
                    'sales_masters.ref_sales_id',
                    'sales_masters.nomor_transaksi',
                    'sales_masters.tanggal_transaksi',
                    'sales_masters.sistem_pembayaran',
                    'sales_masters.nomor_kartu',
                    'sales_masters.nomor_referensi',
                    'sales_masters.dp',
                    'sales_masters.total_tagihan',
                    'sales_masters.status',
                    'sales_masters.verified',

                    'sales_masters.branch_id',
                    'branches.nama_branch',
                    'sales_masters.employee_id',
                    'users.employee_name',
                    'sales_masters.customer_id',
                    'customers.nama_depan',
                    'customers.nama_belakang',
                )
                ->paginate($limit, ['*'], 'page', $page);

            $salesMasterInfoDTOs = [];
            foreach ($salesMasters as $salesMaster) {
                $salesMasterInfoDTO = new SalesMasterInfoDTO(
                    $salesMaster->id,
                    $salesMaster->ref_sales_id,
                    $salesMaster->nomor_transaksi,
                    $salesMaster->tanggal_transaksi,
                    $salesMaster->sistem_pembayaran,
                    $salesMaster->nomor_kartu,
                    $salesMaster->nomor_referensi,
                    $salesMaster->dp,
                    $salesMaster->total_tagihan,
                    $salesMaster->status,
                    $salesMaster->verified,

                    $salesMaster->branch_id,
                    $salesMaster->nama_branch,
                    $salesMaster->employee_id,
                    $salesMaster->employee_name,
                    $salesMaster->customer_id,
                    $salesMaster->nama_depan,
                    $salesMaster->nama_belakang,
                );

                array_push($salesMasterInfoDTOs, $salesMasterInfoDTO);
            }

            return $salesMasterInfoDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
