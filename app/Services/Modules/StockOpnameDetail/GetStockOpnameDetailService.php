<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\StockOpnameDetailInfoDTO;

use App\Repositories\Modules\StockOpnameDetail\GetStockOpnameDetailRepository;

class GetStockOpnameDetailService {
    public function __construct(
        private GetStockOpnameDetailRepository $getStockOpnameDetailRepository
    ) {}

    /**
     * Get all Stock Opname Detail
     * @param Request $request
     * @return StockOpnameDetailInfoDTO
     */
    public function getStockOpnameDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'stock_opname_detail_id' => 'required|exists:stock_opname_details,id',
            ]);

            $stockOpnameDetailInfoDTO = $this->getStockOpnameDetailRepository->getStockOpnameDetail($request->stock_opname_detail_id);

            $stockOpnameDetailInfo = $stockOpnameDetailInfoDTO->toArray();

            return $stockOpnameDetailInfo;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
