<?php

namespace App\Repositories\Modules\SalesDetail;

use Exception;

use App\DTO\Modules\SalesDetailDTOs\SalesDetailBranchItemDTO;

use App\Models\Modules\SalesDetail;

class GetAllSalesDetailBranchItemRepository {
    /**
     * Get All Sales Detail Branch Item
     * @param int $sales_master_id
     * @return SalesDetailBranchItemDTO[]
     */
    public function getAllSalesDetailBranchItem(int $sales_master_id) {
        try {
            $salesDetails = SalesDetail::join('branch_items', 'sales_details.branch_item_id', '=', 'branch_items.id')
                ->where('sales_master_id', $sales_master_id)
                ->get([
                    'sales_details.qty',
                    'sales_details.branch_item_id',
                    'branch_items.item_id',
                    'branch_items.branch_id',
                ]);

            $salesDetailBranchItemDTOs = [];

            foreach ($salesDetails as $salesDetail) {
                $salesDetailBranchItemDTO = new SalesDetailBranchItemDTO(
                    $salesDetail->qty,
                    $salesDetail->item_id,
                    $salesDetail->branch_id,
                );

                array_push($salesDetailBranchItemDTOs, $salesDetailBranchItemDTO);
            }

            return $salesDetailBranchItemDTOs;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
