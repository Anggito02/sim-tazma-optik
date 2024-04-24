<?php

namespace App\Services\Modules\Retur;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReturDTOs\NewReturDTO;

use App\Repositories\Modules\Retur\AddReturRepository;
use App\Services\Modules\Retur\GenerateReturNumberService;

class AddReturService {
    public function __construct(
        private AddReturRepository $returRepository,
        private GenerateReturNumberService $generateReturNumberService
    )
    {}

    /**
     * Add new retur
     * @param Request $request
     * @return ReturInfoDTO
     */
    public function addRetur(Request $request) {
        try {
            // Validate request
            $request->validate([
                'tanggal_pengiriman' => 'required|date|after_or_equal:today',
                'branch_id' => 'required|exists:branches,id',

                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
                'delivered_by' => 'required|exists:users,id',
                'received_by' => 'nullable|exists:users,id',
            ]);

            $nomor_retur = $this->generateReturNumberService->generateReturNumber();

            $tanggal_retur = date('Y-m-d H:i:s');

            $newReturDTO = new NewReturDTO(
                $nomor_retur,
                $tanggal_retur,
                $request->tanggal_pengiriman,
                $request->branch_id,

                $request->checked_by,
                $request->approved_by,
                $request->delivered_by,
                $request->received_by,
            );

            $returDTO = $this->returRepository->addRetur($newReturDTO);

            return $returDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
