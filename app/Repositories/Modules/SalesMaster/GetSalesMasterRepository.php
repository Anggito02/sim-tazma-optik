<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;

use App\Models\Modules\SalesMaster;

use App\DTO\Modules\SalesMasterDTOs\SalesMasterInfoDTO;

class GetSalesMasterRepository {
    /**
     * Get sales master
     *
     * @param string $nomor_transaksi
     * @return SalesMasterInfoDTO
     */
    public function getSalesMaster(string $nomor_transaksi): SalesMasterInfoDTO {
        try {
            $salesMaster = SalesMaster::where('sales_masters.nomor_transaksi', $nomor_transaksi)
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
            ->first();

            if (!$salesMaster) {
                throw new Exception('Sales master not found');
            }

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

            return $salesMasterInfoDTO;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
