<?php

namespace App\Services\Modules\BranchOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchOutgoingDTOs\NewBranchOutgoingDTO;

use App\Repositories\Modules\BranchOutgoing\AddBranchOutgoingRepository;
use App\Services\Modules\BranchOutgoing\GenerateOutgoingNumberService;

class AddBranchOutgoingService {
    public function __construct(
        private AddBranchOutgoingRepository $branchOutgoingRepository,
        private GenerateOutgoingNumberService $generateOutgoingNumberService
    )
    {}

    /**
     * Add new branch outgoing
     * @param Request $request
     * @return BranchOutgoingInfoDTO
     */
    public function addBranchOutgoing(Request $request) {
        try {
            // Validate request
            $request->validate([
                'tanggal_pengiriman' => 'required|date|after_or_equal:today',
                'branch_from_id' => 'required|exists:branches,id',
                'branch_to_id' => 'required|exists:branches,id',
                'known_by' => 'required|exists:users,id',
                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
                'delivered_by' => 'required|exists:users,id',
                'received_by' => 'nullable|exists:users,id',
            ]);

            $nomor_outgoing = $this->generateOutgoingNumberService->generateOutgoingNumber();

            $tanggal_outgoing = date('Y-m-d H:i:s');

            $newBranchOutgoingDTO = new NewBranchOutgoingDTO(
                $nomor_outgoing,
                $tanggal_outgoing,
                $request->tanggal_pengiriman,
                $request->branch_from_id,
                $request->branch_to_id,
                $request->known_by,
                $request->checked_by,
                $request->approved_by,
                $request->delivered_by,
                $request->received_by,
            );

            $branchOutgoingDTO = $this->branchOutgoingRepository->addBranchOutgoing($newBranchOutgoingDTO);

            return $branchOutgoingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
