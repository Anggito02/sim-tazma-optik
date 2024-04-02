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
                'item_id' => 'required|exists:branch_items,id',
                'verified_by' => 'required|exists:users,id',
            ]);

            $editBranchOutgoingDetailDTO = new EditBranchOutgoingDetailDTO(
                $request->id,
                $request->delivered_qty,
                $request->branch_item_id,
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
