<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetail\PurchaseOrderDetailDTO;
use App\Repositories\Modules\PurchaseOrderDetail\AddPODetailRepository;
use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\Item\EditItemRepository;

use App\Repositories\Modules\Item\PriceLogProcedureRepository;

class AddPODetailService {
    public function __construct(
        private AddPODetailRepository $poDetailRepository,
        private GetItemRepository $getItemRepository,
        private EditItemRepository $editItemRepository,

        private PriceLogProcedureRepository $priceLogProcedureRepository,
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
                'item_id' => 'required|exists:items,id',
                'purchase_order_id' => 'required|exists:purchase_orders,id',
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
                null,
                $request->item_id
            );

            $itemDTO = $this->getItemRepository->getItem($request->item_id);

            // update harga log
            if ($itemDTO->harga_beli != $request->harga_beli_satuan) {
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

            if ($itemDTO->harga_jual != $request->harga_jual_satuan) {
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

            // update price in item module
            $itemDTO->harga_beli = $request->harga_beli_satuan;
            $itemDTO->harga_jual = $request->harga_jual_satuan;
            $itemDTO = $this->editItemRepository->editItem($itemDTO);


            $poDetailDTO = $this->poDetailRepository->addPurchaseOrderDetail($poDetailDTO);

            return $poDetailDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
