<?php

namespace App\Repositories\Modules\ReturDetail;

use Exception;

use App\DTO\Modules\ReturDetailDTOs\ReturDetailInfoDTO;

use App\Models\Modules\ReturDetail;

class GetAllReturDetailRepository {
    /**
     * Get all retur detail
     * @param int $returId
     * @return ReturDetailInfoDTO[]
     */
    public function getAllReturDetail(int $returId) {
        try {
            $returDetails = ReturDetail::join('returs', 'returs.id', '=', 'retur_details.retur_id')
                ->join('items', 'items.id', '=', 'retur_details.item_id')
                ->join('users', 'users.id', '=', 'retur_details.verified_by')
                ->where('retur_details.retur_id', $returId)
                ->select(
                    'retur_details.id as id',
                    'retur_details.delivered_qty as delivered_qty',
                    'retur_details.verified_status as verified_status',
                    'retur_details.verified_at as verified_at',

                    'retur_details.retur_id as retur_id',
                    'retur_details.item_id as item_id',
                    'retur_details.verified_by as verified_by',

                    'items.jenis_item as jenis_item',
                    'items.kode_item as kode_item',
                    'users.employee_name as verified_by_name',
                )
                ->get();

            $returDetailDTOs = [];
            foreach ($returDetails as $returDetail) {
                $returDetailDTOs[] = new ReturDetailInfoDTO(
                    $returDetail->id,
                    $returDetail->delivered_qty,
                    $returDetail->verified_at,
                    $returDetail->verified_status,

                    $returDetail->retur_id,
                    $returDetail->item_id,
                    $returDetail->jenis_item,
                    $returDetail->kode_item,

                    $returDetail->verified_by,
                    $returDetail->verified_by_name,
                );
            }

            return $returDetailDTOs;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
