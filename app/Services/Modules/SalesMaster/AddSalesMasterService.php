<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesMaster\AddSalesMasterRepository;

use App\Services\Modules\SalesMaster\GenerateNoTransaksiService;

use App\DTO\Modules\SalesMasterDTOs\NewSalesMasterDTO;

class AddSalesMasterService {
    public function __construct(
        private AddSalesMasterRepository $addSalesMasterRepository,

        private GenerateNoTransaksiService $generateNoTransaksiService,
    )
    {}

    /**
     * Add Sales Master
     * @param Request $request
     * @return SalesMaster
     */
    public function addSalesMaster(Request $request) {
        try {
            // Validate request
            $request->validate([
                'ref_sales_id' => 'required',
                'branch_id' => 'required|exists:branches,id',
                'employee_id' => 'required|exists:users,id',
                'customer_id' => 'nullable|exists:customers,id',
            ]);

            $nomor_transaksi = $this->generateNoTransaksiService->generateNoTransaksi($request->branch_id);

            $tanggal_transaksi = date('Y-m-d H:i:s');

            $newSalesMasterDTO = new NewSalesMasterDTO(
                $request->ref_sales_id,
                $nomor_transaksi,
                $tanggal_transaksi,
                $request->nomor_kartu,
                $request->nomor_referensi,
                $request->branch_id,
                $request->employee_id,
                $request->customer_id,
            );

            $salesMasterDTO = $this->addSalesMasterRepository->addSalesMaster($newSalesMasterDTO);

            return $salesMasterDTO;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
