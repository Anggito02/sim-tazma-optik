<?php

namespace App\Services\Modules\BranchItem;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchItemDTOs\BranchItemInfoDTO;

use App\Repositories\Modules\BranchItem\GetBranchItemRepository;

class GetBranchItemService {
    public function __construct(
        private GetBranchItemRepository $branchItemRepository
    ) {}

    /**
     * Get branch item
     * @param Request $request
     * @return BranchItemInfoDTO
     */
    public function getBranchItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'item_id' => 'exists:items,id',
                'branch_id' => 'exists:branches,id',
            ]);

            $branchItemDTO = $this->branchItemRepository->getBranchItem($request->branch_id, $request->item_id);

            return $branchItemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
