<?php

namespace App\Services\Modules\BranchItem;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchItemDTOs\NewBranchItemDTO;

use App\Repositories\Modules\BranchItem\AddBranchItemRepository;

class AddBranchItemService {
    public function __construct(
        private AddBranchItemRepository $branchItemRepository
    ) {}

    /**
     * Add new branch item
     * @param Request $request
     * @return BranchItemInfoDTO
     */
    public function addBranchItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'item_id' => 'required',
                'branch_id' => 'required',
            ]);

            $newBranchItemDTO = new NewBranchItemDTO(
                $request->item_id,
                $request->branch_id,
            );

            $branchItemDTO = $this->branchItemRepository->addBranchItem($newBranchItemDTO);

            return $branchItemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
