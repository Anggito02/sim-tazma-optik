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
                ->where('purchase_orders.id', '=', $po_id)
                ->first();
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
