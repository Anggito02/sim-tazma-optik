<?php

namespace App\Repositories\Modules\BranchOutgoingDetail;

use Exception;

use App\DTO\Modules\BranchOutgoingDetailDTOs\BranchOutgoingDetailInfoDTO;

use App\Models\Modules\BranchOutgoingDetail;

class GetAllBranchOutgoingDetailRepository {
    /**
     * Get all branch outgoing detail
     * @param int $branchOutgoingId
     * @return BranchOutgoingDetailInfoDTO[]
     */
    public function getAllBranchOutgoingDetail(int $branchOutgoingId) {
        try {
            $branchOutgoingDetails = BranchOutgoingDetail::join('branch_outgoings', 'branch_outgoings.id', '=', 'branch_outgoing_details.branch_outgoing_id')
                ->join('items', 'items.id', '=', 'branch_outgoing_details.item_id')
                ->join('users', 'users.id', '=', 'branch_outgoing_details.verified_by')
                ->where('branch_outgoing_details.branch_outgoing_id', $branchOutgoingId)
                ->select(
                    'branch_outgoing_details.id as id',
                    'branch_outgoing_details.delivered_qty as delivered_qty',
                    'branch_outgoing_details.verified_status as verified_status',
                    'branch_outgoing_details.verified_at as verified_at',

                    'branch_outgoing_details.branch_outgoing_id as branch_outgoing_id',
                    'branch_outgoing_details.item_id as item_id',
                    'branch_outgoing_details.verified_by as verified_by',

                    'branch_outgoing_details.branch_from_id as branch_from_id',
                    'branch_outgoing_details.branch_to_id as branch_to_id',

                    'items.jenis_item as jenis_item',
                    'items.kode_item as kode_item',
                    'users.employee_name as verified_by_name',
                )
                ->get();

            $branchOutgoingDetailDTOs = [];
            foreach ($branchOutgoingDetails as $branchOutgoingDetail) {
                $branchOutgoingDetailDTOs[] = new BranchOutgoingDetailInfoDTO(
                    $branchOutgoingDetail->id,
                    $branchOutgoingDetail->delivered_qty,
                    $branchOutgoingDetail->verified_at,
                    $branchOutgoingDetail->verified_status,

                    $branchOutgoingDetail->branch_outgoing_id,
                    $branchOutgoingDetail->item_id,
                    $branchOutgoingDetail->jenis_item,
                    $branchOutgoingDetail->kode_item,

                    $branchOutgoingDetail->branch_from_id,
                    $branchOutgoingDetail->branch_to_id,

                    $branchOutgoingDetail->verified_by,
                    $branchOutgoingDetail->verified_by_name,
                );
            }

            return $branchOutgoingDetailDTOs;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
