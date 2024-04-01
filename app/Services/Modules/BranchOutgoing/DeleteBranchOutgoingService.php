<?php

namespace App\Services\Modules\BranchOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\BranchOutgoing\DeleteBranchOutgoingRepository;

class DeleteBranchOutgoingService {
    public function __construct(
        private DeleteBranchOutgoingRepository $branchOutgoingRepository
    ) {}

    /**
     * Delete branch outgoing
     * @param Request $request
     * @return bool
     */
    public function deleteBranchOutgoing(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:branch_outgoings,id',
            ]);

            $branchOutgoing = $this->branchOutgoingRepository->deleteBranchOutgoing($request->id);

            return $branchOutgoing;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
