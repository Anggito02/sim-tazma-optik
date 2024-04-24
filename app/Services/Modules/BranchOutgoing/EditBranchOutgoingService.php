<?php

namespace App\Services\Modules\BranchOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchOutgoingDTOs\EditBranchOutgoingDTO;

use App\Repositories\Modules\BranchOutgoing\EditBranchOutgoingRepository;

class EditBranchOutgoingService {
    public function __construct(
        private EditBranchOutgoingRepository $branchOutgoingRepository
    ) {}

    /**
     * Edit branch outgoing
     * @param Request $request
     * @return EditBranchOutgoingDTO
     */
    public function editBranchOutgoing(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:branch_outgoings,id',
                'tanggal_pengiriman' => 'required|date|after_or_equal:today',

                'branch_from_id' => 'required|exists:branches,id',
                'branch_to_id' => 'required|exists:branches,id',

                'known_by' => 'required|exists:users,id',
                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
                'delivered_by' => 'required|exists:users,id',
                'received_by' => 'nullable|exists:users,id',
            ]);

            $editBranchOutgoingDTO = new EditBranchOutgoingDTO(
                $request->id,
                $request->tanggal_pengiriman,

                $request->branch_from_id,
                $request->branch_to_id,

                $request->known_by,
                $request->checked_by,
                $request->approved_by,
                $request->delivered_by,
                $request->received_by,
            );

            $branchOutgoingDTO = $this->branchOutgoingRepository->editBranchOutgoing($editBranchOutgoingDTO);

            return $branchOutgoingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
