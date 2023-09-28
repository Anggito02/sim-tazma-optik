<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetailDTO;
use App\Repositories\Modules\PurchaseOrderDetail\AddPODetailRepository;
use App\Repositories\Modules\Item\GetItemRepository;

use App\Repositories\Modules\Item\PriceLogProcedureRepository;
use App\Repositories\Modules\Item\StockLogProcedureRepository;

class AddPODetailService {
    public function __construct(
        private AddPODetailRepository $poDetailRepository,
        private GetItemRepository $getItemRepository,

        private PriceLogProcedureRepository $priceLogProcedureRepository,
        private StockLogProcedureRepository $stockLogProcedureRepository
    ) {}

    /**
     * Add Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetailDTO
     */
    public function addPurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'pre_order_qty' => 'required|gte:0',
                'unit' => 'required',
                'harga_beli_satuan' => 'required|gte:0',
                'harga_jual_satuan' => 'required|gte:0',
                'diskon' => 'required|gte:0',
                'purchase_order_id' => 'required|exists:purchase_orders,id',
                'item_id' => 'required|exists:items,id',
            ]);

            $poDetailDTO = new PurchaseOrderDetailDTO(
                null,
                $request->pre_order_qty,
                null,
                null,
                $request->unit,
                $request->harga_beli_satuan,
                $request->harga_jual_satuan,
                $request->diskon,
                $request->purchase_order_id,
                $request->item_id
            );

            $itemDTO = $this->getItemRepository->getItem($request->item_id);

            // update harga log
            if ((int)$itemDTO->harga_beli != $request->harga_beli_satuan) {
                $this->priceLogProcedureRepository->priceLogProcedure(
                    'harga_beli',
                    date('Y-m-d H:i:s'),
                    $itemDTO->harga_beli,
                    $request->harga_beli_satuan,
                    'purchase_order',
                    $request->item_id,
                    $request->purchase_order_id
                );
            }

            if ((int)$itemDTO->harga_jual != $request->harga_jual_satuan) {
                $this->priceLogProcedureRepository->priceLogProcedure(
                    'harga_jual',
                    date('Y-m-d H:i:s'),
                    $itemDTO->harga_jual,
                    $request->harga_jual_satuan,
                    'purchase_order',
                    $request->item_id,
                    $request->purchase_order_id
                );
            }

            $poDetailDTO = $this->poDetailRepository->addPurchaseOrderDetail($poDetailDTO);

            return $poDetailDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
