<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\AdjustInfoSODetailDTO;

use App\Services\Modules\ItemOutgoing\AddItemOutgoingService;
use App\Services\Modules\OutgoingDetail\AddOutgoingDetailService;
use App\Services\Modules\OutgoingDetail\VerifyOutgoingDetailService;


class AdjustOutSODetailService {
    public function __construct(
        private AddItemOutgoingService $addItemOutgoingService,
        private AddOutgoingDetailService $addOutgoingDetailService,
        private VerifyOutgoingDetailService $verifyOutgoingDetailService
    )
    {}

    /**
     * Make Adjustment Stock Opname Detail
     * @param AdjustInfoSODetailDTO $adjustInfoSODetailDTO
     * @return AdjustStockOpnameDetailRepository
     */
    public function makeAdjustmentSODetail(AdjustInfoSODetailDTO $adjustInfoSODetailDTO) {
        try {
            $adjustment_by = $adjustInfoSODetailDTO->adjustment_by;
            $item_id = $adjustInfoSODetailDTO->item_id;
            $in_out_qty = $adjustInfoSODetailDTO->in_out_qty;

            $itemOutgoing = $this->addItemOutgoingService->addItemOutgoing(new Request([
                'tanggal_pengiriman' => date('Y/m/d H:i:s'),
                'branch_id' => 1,
                'known_by' => $adjustment_by,
                'checked_by' => $adjustment_by,
                'approved_by' => $adjustment_by,
                'delivered_by' => $adjustment_by,
                'received_by' => $adjustment_by,
            ]));

            $outgoingDetail = $this->addOutgoingDetailService->addOutgoingDetail(new Request([
                'delivered_qty' => $in_out_qty,
                'outgoing_id' => $itemOutgoing->id,
                'item_id' => $item_id,
                'verified_by' => $adjustment_by,
            ]));

            $outgoingVerify = $this->verifyOutgoingDetailService->verifyOutgoingDetail(new Request([
                'id' => $outgoingDetail->id,
                'delivered_qty' => $in_out_qty,
                'item_id' => $item_id,
                'outgoing_id' => $itemOutgoing->id,
            ]));

            return [
                'item_outgoing' => $itemOutgoing,
                'outgoing_detail' => $outgoingDetail,
                'verify_outgoing_detail' => $outgoingVerify
            ];

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
