<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\StockOpnameDetailInfoDTO;
use App\DTO\Modules\StockOpnameDetailDTOs\StockOpnameDetailFilterDTO;

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
                'tanggal_so_from' => 'date',
                'tanggal_so_until' => 'date',
                'adjustment_type' => 'in:IN,OUT,NONE',
                'adjustment_date_from' => 'date',
                'adjustment_date_until' => 'date',
                'adjustment_status' => 'in:OPEN,CLOSED',
                'jenis_item' => 'in:frame,lensa,aksesoris',
                'open_by' => 'exists:users,id',
                'closed_by' => 'exists:users,id',
                'adjustment_by' => 'exists:users,id',
            ]);

            $SODetailDTO = new StockOpnameDetailFilterDTO(
                $request->page,
                $request->limit,
                $request->stock_opname_id,
                $request->tanggal_so_from ? $request->tanggal_so_from : '2000-01-01',
                $request->tanggal_so_until,
                $request->adjustment_type,
                $request->adjustment_date_from,
                $request->adjustment_date_until,
                $request->adjustment_status,
                $request->jenis_item,
                $request->open_by,
                $request->closed_by,
                $request->adjustment_by
            );

            $stockOpnameDetailInfoDTO = $this->getAllStockOpnameDetailRepository->getAllStockOpnameDetail($SODetailDTO);

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
