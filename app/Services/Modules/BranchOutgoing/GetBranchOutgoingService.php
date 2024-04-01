<?php

namespace App\Services\Modules\BranchOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchOutgoingDTOs\BranchOutgoingInfoDTO;

use App\Repositories\Modules\BranchOutgoing\GetBranchOutgoingRepository;

class GetBranchOutgoingService {
    public function __construct(
        private GetBranchOutgoingRepository $branchOutgoingRepository
    ) {}

    /**
     * Get branch outgoing
     * @param Request $request
     * @return BranchOutgoingInfoDTO
     */
    public function getBranchOutgoing(Request $request) {
        // Validate request
        $request->validate([
            'id' => 'required|exists:branch_outgoings,id'
        ]);

        $id = $request->id;

        try {
            $branchOutgoingDTO = $this->branchOutgoingRepository->getBranchOutgoing($id);

            return $branchOutgoingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
