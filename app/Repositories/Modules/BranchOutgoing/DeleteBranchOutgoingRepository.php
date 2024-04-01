<?php

namespace App\Repositories\Modules\BranchOutgoing;

use Exception;

use App\Models\Modules\BranchOutgoing;

class DeleteBranchOutgoingRepository {
    /**
     * Delete branch outgoing
     * @param int $id
     * @return bool
     */
    public function deleteBranchOutgoing(int $id) {
        try {
            $branchOutgoing = BranchOutgoing::where('id', $id)
                ->delete();

            return $branchOutgoing;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}


?>
