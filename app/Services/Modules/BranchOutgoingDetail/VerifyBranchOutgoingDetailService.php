<?php

namespace App\Services\Modules\BranchOutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\BranchOutgoingDetail\VerifyBranchOutgoingDetailRepository;
use App\Repositories\Modules\BranchOutgoing\GetBranchOutgoingRepository;
use App\Services\Modules\BranchItem\AddBranchItemService;
use App\Services\Modules\BranchItem\UpdateBranchStokService;
use App\Repositories\Modules\BranchItem\CheckBranchItemExistenceRepository;

class VerifyBranchOutgoingDetailService {
    public function __construct(
        private VerifyBranchOutgoingDetailRepository $branchOutgoingDetailRepository,
        private GetBranchOutgoingRepository $getBranchOutgoingRepository,
        private AddBranchItemService $addBranchItemService,
        private UpdateBranchStokService $updateBranchStokService,
        private CheckBranchItemExistenceRepository $checkBranchItemExistenceRepository
        )
    {}

    /**
     * Verify outgoing detail
     * @param Request $request
     * @return OutgoingDetailInfoDTO
     */
    public function verifyBranchOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:outgoing_details,id',
                'delivered_qty' => 'required|numeric|min:1',
                'item_id' => 'required|exists:items,id',
                'branch_outgoing_id' => 'required|exists:branch_outgoings,id',
            ]);

            // Get Branch Outgoing
            $branchOutgoing = $this->getBranchOutgoingRepository->getBranchOutgoing($request->branch_outgoing_id);

            $branch_from_id = $branchOutgoing->getBranchFromId();
            $branch_to_id = $branchOutgoing->getBranchToId();

            // Update item stock from
            $this->updateBranchStokService->updateBranchStok(new Request([
                'item_id' => $request->item_id,
                'branch_id' => $branch_from_id,
                'jumlah_perubahan' => $request->delivered_qty,
                'jenis_perubahan' => 'pengurangan'
            ]));

            // Update item stock to
            // Check exists
            $isBranchItemExists = $this->checkBranchItemExistenceRepository->checkBranchItemExistence(
                $branch_to_id,
                $request->item_id
            );

            if (!$isBranchItemExists) {
                $this->addBranchItemService->addBranchItem(new Request([
                    'item_id' => $request->item_id,
                    'branch_id' => $branch_to_id
                ]));
            }

            $this->updateBranchStokService->updateBranchStok(new Request([
                'item_id' => $request->item_id,
                'branch_id' => $branch_to_id,
                'jumlah_perubahan' => $request->delivered_qty,
                'jenis_perubahan' => 'penambahan'
            ]));

            $branchOutgoingDetailDTO = $this->branchOutgoingDetailRepository->verifyBranchOutgoingDetail($request->id);

            return $branchOutgoingDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
