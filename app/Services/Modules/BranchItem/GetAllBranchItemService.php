<?php

namespace App\Services\Modules\BranchItem;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchItemDTOs\BranchItemInfoDTO;

use App\Repositories\Modules\BranchItem\GetAllBranchItemRepository;

class GetAllBranchItemService {
    public function __construct(
        private GetAllBranchItemRepository $branchItemRepository
    ) {}

    /**
     * Get all branch item
     * @param Request $request
     * @return BranchItemInfoDTO
     */
    public function getAllBranchItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $branchItemDTO = $this->branchItemRepository->getAllBranchItem($request->page, $request->limit);

            return $branchItemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
