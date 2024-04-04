<?php

namespace App\Services\Modules\BranchOutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchOutgoingDetailDTOs\EditBranchOutgoingDetailDTO;

use App\Repositories\Modules\BranchOutgoingDetail\EditBranchOutgoingDetailRepository;

class EditBranchOutgoingDetailService {
    public function __construct(
        private EditBranchOutgoingDetailRepository $branchOutgoingDetailRepository
    ) {}

    /**
     * Edit branch outgoing detail
     * @param Request $request
     * @return EditBranchOutgoingDetailDTO
     */
    public function editBranchOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:branch_outgoing_details,id',
                'delivered_qty' => 'required|numeric|min:1',
                'item_id' => 'required|exists:items,id',
                'branch_from_id' => 'required|exists:branches,id',
                'branch_to_id' => 'required|exists:branches,id',
                'verified_by' => 'required|exists:users,id',
            ]);

            $editBranchOutgoingDetailDTO = new EditBranchOutgoingDetailDTO(
                $request->id,
                $request->delivered_qty,
                $request->item_id,
                $request->branch_from_id,
                $request->branch_to_id,
                $request->verified_by,
            );

            $branchOutgoingDetailDTO = $this->branchOutgoingDetailRepository->editBranchOutgoingDetail($editBranchOutgoingDetailDTO);

            return $branchOutgoingDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
