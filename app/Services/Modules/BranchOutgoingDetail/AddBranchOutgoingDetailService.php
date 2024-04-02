<?php

namespace App\Services\Modules\BranchOutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchOutgoingDetailDTOs\NewBranchOutgoingDetailDTO;
use App\Repositories\Modules\BranchOutgoing\GetBranchOutgoingRepository;
use App\Repositories\Modules\BranchOutgoingDetail\AddBranchOutgoingDetailRepository;

class AddBranchOutgoingDetailService {
    public function __construct(
        private GetBranchOutgoingRepository $branchOutgoingRepository,
        private AddBranchOutgoingDetailRepository $branchOutgoingDetailRepository
    )
    {}

    /**
     * Add new branch outgoing detail
     * @param Request $request
     * @return BranchOutgoingDetailInfoDTO
     */
    public function addBranchOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'delivered_qty' => 'required|numeric|min:1',

                'branch_outgoing_id' => 'required|exists:branch_outgoings,id',
                'item_id' => 'required|exists:items,id',
                'verified_by' => 'required|exists:users,id',
            ]);

            $branch_outgoing = $this->branchOutgoingRepository->getBranchOutgoing($request->branch_outgoing_id);

            $branch_from_id = $branch_outgoing->getBranchFromId();
            $branch_to_id = $branch_outgoing->getBranchToId();

            $newBranchOutgoingDetailDTO = new NewBranchOutgoingDetailDTO(
                $request->delivered_qty,

                $request->branch_outgoing_id,
                $request->item_id,
                $branch_from_id,
                $branch_to_id,
                $request->verified_by,
            );

            $branchOutgoingDetailDTO = $this->branchOutgoingDetailRepository->addBranchOutgoingDetail($newBranchOutgoingDetailDTO);

            return $branchOutgoingDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
