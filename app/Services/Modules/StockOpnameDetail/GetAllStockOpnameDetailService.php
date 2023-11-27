<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\StockOpnameDetailInfoDTO;

use App\Repositories\Modules\StockOpnameDetail\GetAllStockOpnameDetailRepository;

class GetAllStockOpnameDetailService {
    public function __construct(
        private GetAllStockOpnameDetailRepository $getAllStockOpnameDetailRepository
    ) {}

    /**
     * Get all Stock Opname Detail
     * @param Request $request
     * @return StockOpnameDetailInfoDTO
     */
    public function getAllStockOpnameDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
                'stock_opname_id' => 'required|exists:stock_opname_masters,id',
            ]);

            $stockOpnameDetailInfoDTO = $this->getAllStockOpnameDetailRepository->getAllStockOpnameDetail($request->page, $request->limit, $request->stock_opname_id);

            $stockOpnameDetailInfos = [];

            foreach ($stockOpnameDetailInfoDTO as $stockOpnameDetailinfo) {
                array_push($stockOpnameDetailInfos, $stockOpnameDetailinfo->toArray());
            }

            return $stockOpnameDetailInfos;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
