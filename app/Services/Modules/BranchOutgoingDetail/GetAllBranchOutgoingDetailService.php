<?php

namespace App\Services\Modules\BranchOutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchOutgoingDetailDTOs\BranchOutgoingDetailInfoDTO;

use App\Repositories\Modules\BranchOutgoingDetail\GetAllBranchOutgoingDetailRepository;

class GetAllBranchOutgoingDetailService {
    public function __construct(
        private GetAllBranchOutgoingDetailRepository $branchOutgoingDetailRepository
    )
    {}

    /**
     * Get all branch outgoing detail
     * @param Request $request
     * @return BranchOutgoingDetailInfoDTO[]
     */
    public function getAllBranchOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'branch_outgoing_id' => 'required|exists:branch_outgoings,id',
            ]);

            $branchOutgoingDetailDTOs = $this->branchOutgoingDetailRepository->getAllBranchOutgoingDetail($request->branch_outgoing_id);

            return $branchOutgoingDetailDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
