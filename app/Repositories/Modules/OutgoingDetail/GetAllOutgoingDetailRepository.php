<?php

namespace App\Repositories\Modules\OutgoingDetail;

use Exception;

use App\DTO\Modules\OutgoingDetailDTOs\OutgoingDetailInfoDTO;

use App\Models\Modules\OutgoingDetail;

class GetAllOutgoingDetailRepository {
    /**
     * Get all outgoing detail
     * @param int $outgoingId
     * @return OutgoingDetailInfoDTO[]
     */
    public function getAllOutgoingDetail(int $outgoingId) {
        try {
            $outgoingDetails = OutgoingDetail::join('item_outgoings', 'item_outgoings.id', '=', 'outgoing_details.outgoing_id')
                ->join('items', 'items.id', '=', 'outgoing_details.item_id')
                ->join('users', 'users.id', '=', 'outgoing_details.verified_by')
                ->where('outgoing_details.outgoing_id', $outgoingId)
                ->select(
                    'outgoing_details.id as id',
                    'outgoing_details.delivered_qty as delivered_qty',
                    'outgoing_details.verified_status as verified_status',
                    'outgoing_details.verified_at as verified_at',

                    'outgoing_details.outgoing_id as outgoing_id',
                    'outgoing_details.item_id as item_id',
                    'outgoing_details.verified_by as verified_by',

                    'items.jenis_item as jenis_item',
                    'items.kode_item as kode_item',
                    'users.employee_name as verified_by_name',
                )
                ->get();

            $outgoingDetailDTOs = [];
            foreach ($outgoingDetails as $outgoingDetail) {
                $outgoingDetailDTOs[] = new OutgoingDetailInfoDTO(
                    $outgoingDetail->id,
                    $outgoingDetail->delivered_qty,
                    $outgoingDetail->verified_at,
                    $outgoingDetail->verified_status,

                    $outgoingDetail->outgoing_id,
                    $outgoingDetail->item_id,
                    $outgoingDetail->jenis_item,
                    $outgoingDetail->kode_item,

                    $outgoingDetail->verified_by,
                    $outgoingDetail->verified_by_name,
                );
            }

            return $outgoingDetailDTOs;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
