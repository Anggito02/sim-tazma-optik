<?php

namespace App\Repositories\Modules\ReceiveOrder;

use Exception;
use Illuminate\Support\Facades\DB;

use App\DTO\Modules\ReceiveOrderDTO;

class GetReceiveOrderWithInfoRepository {
    public function getReceiveOrderWithInfo($po_id) {
        try {
            $receive_order = DB::table('receive_orders')
                ->join('users as received_by', 'receive_orders.received_by', '=', 'received_by.id')
                ->join('users as checked_by', 'receive_orders.checked_by', '=', 'checked_by.id')
                ->join('users as approved_by', 'receive_orders.approved_by', '=', 'approved_by.id')
                ->select('receive_orders.*', 'received_by.employee_name as received_by_name', 'checked_by.employee_name as checked_by_name', 'approved_by.employee_name as approved_by_name')
                ->where('receive_orders.purchase_order_id', '=', $po_id)
                ->first();

            $receiveOrderDTO = [
                'id' => $receive_order->id,
                'nomor_receive_order' => $receive_order->nomor_receive_order,
                'tanggal_penerimaan' => $receive_order->tanggal_penerimaan,
                'purchase_order_id' => $receive_order->purchase_order_id,
                'received_by' => $receive_order->received_by,
                'received_by_name' => $receive_order->received_by_name,
                'checked_by' => $receive_order->checked_by,
                'checked_by_name' => $receive_order->checked_by_name,
                'approved_by' => $receive_order->approved_by,
                'approved_by_name' => $receive_order->approved_by_name,
            ];

            return $receiveOrderDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
