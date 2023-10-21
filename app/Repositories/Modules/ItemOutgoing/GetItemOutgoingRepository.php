<?php

namespace App\Repositories\Modules\ItemOutgoing;

use Exception;

use App\DTO\Modules\ItemOutgoingDTOs\ItemOutgoingInfoDTO;
use App\Models\Modules\ItemOutgoing;

class GetItemOutgoingRepository {
    /**
     * Get item outgoing
     * @param int $id
     * @return ItemOutgoingInfoDTO
     */
    public function getItemOutgoing(int $id) {
        try {
            $itemOutgoing = ItemOutgoing::join('branches', 'item_outgoings.branch_id', '=', 'branches.id')
                ->join('users as packed_by', 'item_outgoings.packed_by', '=', 'packed_by.id')
                ->join('users as checked_by', 'item_outgoings.checked_by', '=', 'checked_by.id')
                ->join('users as approved_by', 'item_outgoings.approved_by', '=', 'approved_by.id')
                ->select(
                    'item_outgoings.id as id',
                    'item_outgoings.nomor_outgoing as nomor_outgoing',
                    'item_outgoings.tanggal_outgoing as tanggal_outgoing',
                    'item_outgoings.tanggal_pengiriman as tanggal_pengiriman',

                    'item_outgoings.branch_id as branch_id',
                    'branches.nama as branch_nama',

                    'item_outgoings.packed_by as packed_by',
                    'packed_by.nama as packed_by_nama',

                    'item_outgoings.checked_by as checked_by',
                    'checked_by.nama as checked_by_nama',

                    'item_outgoings.approved_by as approved_by',
                    'approved_by.nama as approved_by_nama',
                )
                ->where('item_outgoings.id', $id)
                ->first();

            $itemOutgoingInfoDTO = new ItemOutgoingInfoDTO(
                $itemOutgoing->id,
                $itemOutgoing->nomor_outgoing,
                $itemOutgoing->tanggal_outgoing,
                $itemOutgoing->tanggal_pengiriman,

                $itemOutgoing->branch_id,
                $itemOutgoing->branch_nama,

                $itemOutgoing->packed_by,
                $itemOutgoing->packed_by_nama,

                $itemOutgoing->checked_by,
                $itemOutgoing->checked_by_nama,

                $itemOutgoing->approved_by,
                $itemOutgoing->approved_by_nama,
            );

            return $itemOutgoingInfoDTO;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
