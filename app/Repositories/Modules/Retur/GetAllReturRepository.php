<?php

namespace App\Repositories\Modules\Retur;

use Exception;

use App\DTO\Modules\ReturDTOs\ReturInfoDTO;
use App\Models\Modules\Retur;

class GetAllReturRepository {
    /**
     * Get all retur
     * @param int $page
     * @param int $limit
     * @return ReturInfoDTO[]
     */
    public function getAllRetur(int $page, int $limit) {
        try {
            // use pagination
            $returs = Retur::join('branches', 'returs.branch_id', '=', 'branches.id')
                ->join('users as checked_by', 'returs.checked_by', '=', 'checked_by.id')
                ->join('users as approved_by', 'returs.approved_by', '=', 'approved_by.id')
                ->join('users as delivered_by', 'returs.delivered_by', '=', 'delivered_by.id')
                ->leftJoin('users as received_by', 'returs.received_by', '=', 'received_by.id')
                ->select(
                    'returs.id as id',
                    'returs.nomor_retur as nomor_retur',
                    'returs.tanggal_retur as tanggal_retur',
                    'returs.tanggal_pengiriman as tanggal_pengiriman',

                    'returs.branch_id as branch_id',
                    'branches.nama_branch as nama_branch',
                    'branches.kode_branch as kode_branch',

                    'returs.checked_by as checked_by',
                    'checked_by.employee_name as checked_by_nama',

                    'returs.approved_by as approved_by',
                    'approved_by.employee_name as approved_by_nama',

                    'returs.delivered_by as delivered_by',
                    'delivered_by.employee_name as delivered_by_nama',

                    'returs.received_by as received_by',
                    'received_by.employee_name as received_by_nama',
                )
                ->paginate($limit, ['*'], 'page', $page);

            $returInfoDTOs = [];

            foreach ($returs as $retur) {
                $returInfoDTO = new ReturInfoDTO(
                    $retur->id,
                    $retur->nomor_retur,
                    $retur->tanggal_retur,
                    $retur->tanggal_pengiriman,

                    $retur->branch_id,
                    $retur->kode_branch,
                    $retur->nama_branch,

                    $retur->received_by,
                    $retur->received_by_nama,

                    $retur->checked_by,
                    $retur->checked_by_nama,

                    $retur->approved_by,
                    $retur->approved_by_nama,

                    $retur->delivered_by,
                    $retur->delivered_by_nama,
                );

                array_push($returInfoDTOs, $returInfoDTO);
            }

            return $returInfoDTOs;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}


?>
