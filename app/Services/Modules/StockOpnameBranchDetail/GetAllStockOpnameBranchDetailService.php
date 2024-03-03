<?php

namespace App\Services\Modules\StockOpnameBranchDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\StockOpnameBranchDetailFilterDTO;

use App\Repositories\Modules\StockOpnameBranchDetail\GetAllStockOpnameBranchDetailRepository;

class GetAllStockOpnameBranchDetailService {
    public function __construct(
        private GetAllStockOpnameBranchDetailRepository $getAllStockOpnameBranchDetailRepository
    )
    {}

    /**
     * Get All Stock Opname Branch Detail
     * @param Request $request
     * @param StockOpnameBranchDetailFilterDTO $stockOpnameBranchDetailFilterDTO
     */
    public function getAllStockOpnameBranchDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
                'stock_opname_branch_id' => 'required|exists:stock_opname_branches,id',
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

            $SOBranchDetailDTO = new StockOpnameBranchDetailFilterDTO(
                $request->page,
                $request->limit,
                $request->stock_opname_branch_id,
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

            $stockOpnameBranchDetailInfoDTO = $this->getAllStockOpnameBranchDetailRepository->getAllStockOpnameBranchDetail($SOBranchDetailDTO);

            $stockOpnameBranchDetailInfos = [];

            foreach ($stockOpnameBranchDetailInfoDTO as $stockOpnameBranchDetailInfo) {
                array_push($stockOpnameBranchDetailInfos, $stockOpnameBranchDetailInfo->toArray());
            }

            return $stockOpnameBranchDetailInfos;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
