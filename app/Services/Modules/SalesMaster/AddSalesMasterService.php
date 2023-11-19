<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesMaster\AddSalesMasterRepository;

use App\DTO\Modules\SalesMasterDTOs\NewSalesMasterDTO;

class AddSalesMasterService {
    public function __construct(
        private AddSalesMasterRepository $addSalesMasterRepository,
    )
    {}

    /**
     * Add Sales Master
     * @param Request $request
     * @return int
     */
    public function addSalesMaster(Request $request) {
        try {
            // Validate request
            $request->validate([
                'ref_sales_id' => 'required',
                'nomor_transaksi' => 'required|string',
                'tanggal_transaksi' => 'required',
                'sistem_pembayaran' => 'required|string',
                'nomor_kartu' => 'required|string',
                'nomor_referensi' => 'required|string',
                'dp' => 'required',
                'total_tagihan' => 'required|integer',
                'status' => 'required|string',
                'branch_id' => 'required|exists:branches,id',
                'employee_id' => 'required|exists:employees,id',
                'customer_id' => 'required|exists:customers,id',
            ]);

            $newSalesMasterDTO = new NewSalesMasterDTO(
                $request->ref_sales_id,
                $request->nomor_transaksi,
                $request->tanggal_transaksi,
                $request->sistem_pembayaran,
                $request->nomor_kartu,
                $request->nomor_referensi,
                $request->dp,
                $request->total_tagihan,
                $request->status,
                $request->branch_id,
                $request->employee_id,
                $request->customer_id,
            );

            $salesMasterId = $this->addSalesMasterRepository->addSalesMaster($newSalesMasterDTO);

            return $salesMasterId;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
