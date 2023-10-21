<?php

namespace App\Repositories\Modules\ItemOutgoing;

use Exception;

use App\DTO\Modules\ItemOutgoingDTOs\ItemOutgoingInfoDTO;
use App\Models\Modules\ItemOutgoing;

class GetAllItemOutgoingRepository {
    /**
     * Get all item outgoing
     * @param int $page
     * @param int $limit
     * @return ItemOutgoingInfoDTO[]
     */
    public function getAllItemOutgoing(int $page, int $limit) {
        try {
            // use pagination
            $itemOutgoings = ItemOutgoing::join('branches', 'item_outgoings.branch_id', '=', 'branches.id')
                ->join('users as known_by', 'item_outgoings.known_by', '=', 'known_by.id')
                ->join('users as checked_by', 'item_outgoings.checked_by', '=', 'checked_by.id')
                ->join('users as approved_by', 'item_outgoings.approved_by', '=', 'approved_by.id')
                ->join('users as delivered_by', 'item_outgoings.delivered_by', '=', 'delivered_by.id')
                ->select(
                    'item_outgoings.id as id',
                    'item_outgoings.nomor_outgoing as nomor_outgoing',
                    'item_outgoings.tanggal_outgoing as tanggal_outgoing',
                    'item_outgoings.tanggal_pengiriman as tanggal_pengiriman',

                    'item_outgoings.branch_id as branch_id',
                    'branches.nama_branch as nama_branch',
                    'branches.kode_branch as kode_branch',

                    'item_outgoings.known_by as known_by',
                    'known_by.employee_name as known_by_nama',

                    'item_outgoings.checked_by as checked_by',
                    'checked_by.employee_name as checked_by_nama',

                    'item_outgoings.approved_by as approved_by',
                    'approved_by.employee_name as approved_by_nama',

                    'item_outgoings.delivered_by as delivered_by',
                    'delivered_by.employee_name as delivered_by_nama',
                )
                ->paginate($limit, ['*'], 'page', $page);

            $itemOutgoingInfoDTOs = [];

            foreach ($itemOutgoings as $itemOutgoing) {
                $itemOutgoingInfoDTO = new ItemOutgoingInfoDTO(
                    $itemOutgoing->id,
                    $itemOutgoing->nomor_outgoing,
                    $itemOutgoing->tanggal_outgoing,
                    $itemOutgoing->tanggal_pengiriman,

                    $itemOutgoing->branch_id,
                    $itemOutgoing->nama_branch,
                    $itemOutgoing->kode_branch,

                    $itemOutgoing->known_by,
                    $itemOutgoing->known_by_nama,

                    $itemOutgoing->checked_by,
                    $itemOutgoing->checked_by_nama,

                    $itemOutgoing->approved_by,
                    $itemOutgoing->approved_by_nama,

                    $itemOutgoing->delivered_by,
                    $itemOutgoing->delivered_by_nama,
                );

                array_push($itemOutgoingInfoDTOs, $itemOutgoingInfoDTO);
            }

            return $itemOutgoingInfoDTOs;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}


?>
