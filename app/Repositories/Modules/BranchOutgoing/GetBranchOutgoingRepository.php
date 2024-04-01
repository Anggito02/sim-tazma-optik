<?php

namespace App\Repositories\Modules\BranchOutgoing;

use Exception;

use App\DTO\Modules\BranchOutgoingDTOs\BranchOutgoingInfoDTO;
use App\Models\Modules\BranchOutgoing;

class GetBranchOutgoingRepository {
    /**
     * Get branch outgoing
     * @param int $id
     * @return BranchOutgoingInfoDTO
     */
    public function getBranchOutgoing(int $id) {
        try {
            $branchOutgoing = BranchOutgoing::join('branches as branches_from', 'branch_outgoings.branch_from_id', '=', 'branches_from.id')
            ->join('branches as branches_to', 'branch_outgoings.branch_to', '=', 'branches_to.id')
            ->join('users as known_by', 'branch_outgoings.known_by', '=', 'known_by.id')
            ->join('users as checked_by', 'branch_outgoings.checked_by', '=', 'checked_by.id')
            ->join('users as approved_by', 'branch_outgoings.approved_by', '=', 'approved_by.id')
            ->join('users as delivered_by', 'branch_outgoings.delivered_by', '=', 'delivered_by.id')
            ->leftJoin('users as received_by', 'branch_outgoings.received_by', '=', 'received_by.id')
            ->select(
                'branch_outgoings.id as id',
                'branch_outgoings.nomor_outgoing as nomor_outgoing',
                'branch_outgoings.tanggal_outgoing as tanggal_outgoing',
                'branch_outgoings.tanggal_pengiriman as tanggal_pengiriman',

                'branch_outgoings.branch_from_id as branch_from_id',
                'branches_from.nama_branch as nama_branch_from',
                'branches_from.kode_branch as kode_branch_from',

                'branch_outgoings.branch_to as branch_to',
                'branches_to.kode_branch as kode_branch_to',
                'branches_to.nama_branch as nama_branch_to',

                'branch_outgoings.known_by as known_by',
                'known_by.employee_name as known_by_nama',

                'branch_outgoings.checked_by as checked_by',
                'checked_by.employee_name as checked_by_nama',

                'branch_outgoings.approved_by as approved_by',
                'approved_by.employee_name as approved_by_nama',

                'branch_outgoings.delivered_by as delivered_by',
                'delivered_by.employee_name as delivered_by_nama',

                'branch_outgoings.received_by as received_by',
                'received_by.employee_name as received_by_nama',
                )
                ->where('branch_outgoings.id', $id)
                ->first();

            $branchOutgoingInfoDTO = new BranchOutgoingInfoDTO(
                $branchOutgoing->id,
                $branchOutgoing->nomor_outgoing,
                $branchOutgoing->tanggal_outgoing,
                $branchOutgoing->tanggal_pengiriman,

                $branchOutgoing->branch_from_id,
                $branchOutgoing->kode_branch_from,
                $branchOutgoing->nama_branch_from,

                $branchOutgoing->branch_to,
                $branchOutgoing->kode_branch_to,
                $branchOutgoing->nama_branch_to,

                $branchOutgoing->known_by,
                $branchOutgoing->known_by_nama,

                $branchOutgoing->checked_by,
                $branchOutgoing->checked_by_nama,

                $branchOutgoing->approved_by,
                $branchOutgoing->approved_by_nama,

                $branchOutgoing->delivered_by,
                $branchOutgoing->delivered_by_nama,

                $branchOutgoing->received_by,
                $branchOutgoing->received_by_nama,
            );

            return $branchOutgoingInfoDTO;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
