<?php

namespace App\Services\Modules\SalesDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesDetail\GetAllSalesDetailRepository;

class GetAllSalesDetailService {
    public function __construct(
        private GetAllSalesDetailRepository $getAllSalesDetailRepository,
    )
    {}

    /**
     * Get All Sales Detail
     * @param Request $request
     * @return array
     */
    public function getAllSalesDetail(Request $request) {
        try {
            // Valdate request
            $request->validate([
                'page' => 'required|integer',
                'limit' => 'required|integer',
                'sales_master_id' => 'required|exists:sales_masters,id',
            ]);

            $page = $request->page;
            $limit = $request->limit;
            $sales_master_id = $request->sales_master_id;

            $salesDetailInfoDTOs = $this->getAllSalesDetailRepository->getAllSalesDetail($page, $limit, $sales_master_id);

            $salesDetailInfoArrays = [];

            foreach ($salesDetailInfoDTOs as $salesDetailInfoDTO) {
                array_push($salesDetailInfoArrays, $salesDetailInfoDTO->toArray());
            }

            return $salesDetailInfoArrays;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
