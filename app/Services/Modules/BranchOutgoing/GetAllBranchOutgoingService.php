<?php

namespace App\Services\Modules\BranchOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchOutgoingDTOs\BranchOutgoingInfoDTO;

use App\Repositories\Modules\BranchOutgoing\GetAllBranchOutgoingRepository;

class GetAllBranchOutgoingService {
    public function __construct(
        private GetAllBranchOutgoingRepository $branchOutgoingRepository
    ) {}

    /**
     * Get all branch outgoing
     * @param Request $request
     * @return BranchOutgoingInfoDTO
     */
    public function getAllBranchOutgoing(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $branchOutgoingDTO = $this->branchOutgoingRepository->getAllBranchOutgoing($request->page, $request->limit);

            return $branchOutgoingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>
