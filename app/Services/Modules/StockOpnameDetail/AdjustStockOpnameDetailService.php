<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\AdjustStockOpnameDetailDTO;

use App\Repositories\Modules\StockOpnameDetail\AdjustStockOpnameDetailRepository;

class AdjustStockOpnameDetailService {
    public function __construct(
        private AdjustStockOpnameDetailRepository $adjustStockOpnameDetailRepository,
    )
    {}

    /**
     * Adjust Stock Opname Detail
     * @param Request $request
     * @return AdjustStockOpnameDetailRepository
     */
    public function adjustStockOpnameDetail(Request $request) {
        try {
            // validate request
            $request->validate([
                'id' => 'required|exists:stock_opname_details,id',
                'adjustment_date' => 'required|date_format:Y-m-d H:i:s',
                'adjustment_followup_note' => 'required|string',
                'adjustment_by' => 'required|exists:users,id',
            ]);

            $adjustStockOpnameDetailDTO = new AdjustStockOpnameDetailDTO(
                $request->id,
                $request->adjustment_date,
                $request->adjustment_followup_note,
                $request->adjustment_by,
            );

            $stockOpnameDetail = $this->adjustStockOpnameDetailRepository->updateSODetailAdjustment($adjustStockOpnameDetailDTO);

            return $stockOpnameDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
