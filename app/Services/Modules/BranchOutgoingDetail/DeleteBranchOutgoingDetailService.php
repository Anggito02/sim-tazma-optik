<?php

namespace App\Services\Modules\BranchOutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\BranchOutgoingDetail\DeleteBranchOutgoingDetailRepository;

class DeleteBranchOutgoingDetailService {
    public function __construct(
        private DeleteBranchOutgoingDetailRepository $deleteBranchOutgoingDetailRepository,
    )
    {}

    /**
     * Delete branch outgoing detail
     * @param Request $request
     * @return bool
     */
    public function deleteBranchOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:branch_outgoing_details,id',
            ]);

            $branchOutgoingDetail = $this->deleteBranchOutgoingDetailRepository->deleteBranchOutgoingDetail($request->id);

            return $branchOutgoingDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
