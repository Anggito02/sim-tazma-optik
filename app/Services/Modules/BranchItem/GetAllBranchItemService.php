<?php

namespace App\Services\Modules\BranchItem;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\BranchItemDTOs\BranchItemInfoDTO;
use App\DTO\Modules\BranchItemDTOs\BranchItemFilterDTO;

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

                'branch_id' => 'exists:branches,id',
                'jenis_item' => 'in:frame,lensa,aksesoris',
            ]);

            $branchItemFilterDTO = new BranchItemFilterDTO(
                $request->page,
                $request->limit,
                $request->branch_id,
                $request->jenis_item
            );

            $branchItemDTO = $this->branchItemRepository->getAllBranchItem($branchItemFilterDTO);

            return $branchItemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
