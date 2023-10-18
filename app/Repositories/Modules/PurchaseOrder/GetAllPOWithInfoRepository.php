<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class GetAllPOWithInfoRepository {
    /**
     * Get all purchase order with info
     * @param int $page
     * @param int $limit
     * @return array PurchaseOrderDTO,vendor_name,made_by_name,checked_by_name,approved_by_name
     */
    public function getAllPurchaseOrderWithInfo(int $page, int $limit) {
        try {
            // inner join purchase order and vendor
            $pos = DB::table('purchase_orders')
                ->join('vendors', 'purchase_orders.vendor_id', '=', 'vendors.id')
                ->join('users as made_by', 'purchase_orders.made_by', '=', 'made_by.id')
                ->join('users as checked_by', 'purchase_orders.checked_by', '=', 'checked_by.id')
                ->join('users as approved_by', 'purchase_orders.approved_by', '=', 'approved_by.id')
                ->select('purchase_orders.*', 'vendors.nama_vendor', 'made_by.employee_name as made_by_name', 'checked_by.employee_name as checked_by_name', 'approved_by.employee_name as approved_by_name')
                ->paginate($limit, ['*'], 'page', $page);

            $poDTOs = [];

            foreach ($pos as $po) {
                $poDTO = [
                    'id' => $po->id,
                    'nomor_po' => $po->nomor_po,
                    'tanggal_dibuat' => $po->tanggal_dibuat,
                    'status_po' => $po->status_po,
                    'status_penerimaan' => $po->status_penerimaan,
                    'status_pembayaran' => $po->status_pembayaran,
                    'receive_order_id' => $po->receive_order_id,
                    'vendor_id' => $po->vendor_id,
                    'nama_vendor' => $po->nama_vendor,
                    'made_by_id' => $po->made_by,
                    'made_by_name' => $po->made_by_name,
                    'checked_by_id' => $po->checked_by,
                    'checked_by_name' => $po->checked_by_name,
                    'approved_by_id' => $po->approved_by,
                    'approved_by_name' => $po->approved_by_name,
                ];

                array_push($poDTOs, $poDTO);
            }

            return $poDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
