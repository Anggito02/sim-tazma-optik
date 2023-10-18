<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;
use Illuminate\Support\Facades\DB;

use App\DTO\Modules\PurchaseOrderDTO;

class GetPOWithInfoRepository {
    /**
     * Get Purchase Order with info
     * @param int $id
     * @return PurchaseOrderDTO
     */
    public function getPurchaseOrderWithInfo(int $id) {
        try {
            $po = DB::table('purchase_orders')
                ->join('vendors', 'purchase_orders.vendor_id', '=', 'vendors.id')
                ->join('users as made_by', 'purchase_orders.made_by', '=', 'made_by.id')
                ->join('users as checked_by', 'purchase_orders.checked_by', '=', 'checked_by.id')
                ->join('users as approved_by', 'purchase_orders.approved_by', '=', 'approved_by.id')
                ->select('purchase_orders.*', 'vendors.nama_vendor as nama_vendor', 'made_by.employee_name as made_by_name', 'checked_by.employee_name as checked_by_name', 'approved_by.employee_name as approved_by_name')
                ->where('purchase_orders.id', '=', $id)
                ->first();

            $poDTO = new PurchaseOrderDTO(
                $po->id,
                $po->nomor_po,
                $po->tanggal_dibuat,
                $po->status_po,
                $po->status_penerimaan,
                $po->status_pembayaran,
                $po->vendor_id,
                $po->nama_vendor,
                $po->made_by,
                $po->made_by_name,
                $po->checked_by,
                $po->checked_by_name,
                $po->approved_by,
                $po->approved_by_name
            );

            return $poDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}

?>
