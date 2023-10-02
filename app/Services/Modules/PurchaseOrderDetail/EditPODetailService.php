<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetailDTO;

use App\Repositories\Modules\PurchaseOrderDetail\EditPODetailRepository;
use App\Repositories\Modules\Item\GetItemRepository;

use App\Repositories\Modules\Item\PriceLogProcedureRepository;
use App\Repositories\Modules\Item\StockLogProcedureRepository;

class EditPODetailService {
    public function __construct(
        private EditPODetailRepository $poDetailRepository,
        private GetItemRepository $getItemRepository,

        private PriceLogProcedureRepository $priceLogProcedureRepository,
        private StockLogProcedureRepository $stockLogProcedureRepository
    ) {}

    /**
     * Edit Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetailDTO
     */
    public function editPurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:purchase_order_details,id',
                'pre_order_qty' => 'gte:0',
                'harga_beli_satuan' => 'required|gte:0',
                'harga_jual_satuan' => 'required|gte:0',
                'diskon' => 'gte:0',
                'purchase_order_id' => 'exists:purchase_orders,id',
                'item_id' => 'exists:items,id',
            ]);

            $poDetailDTO = new PurchaseOrderDetailDTO(
                $request->id,
                $request->pre_order_qty,
                $request->received_qty,
                $request->not_good_qty,
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
                    (int)$itemDTO->harga_beli,
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

            // update stok log
            $this->stockLogProcedureRepository->stockLogProcedure(
                date('Y-m-d H:i:s'),
                $itemDTO->stok,
                $itemDTO->stok + $request->received_qty,
                'penambahan',
                $request->item_id,
                $request->purchase_order_id
            );

            $poDetailDTO = $this->poDetailRepository->editPurchaseOrderDetail($poDetailDTO);

            return $poDetailDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
