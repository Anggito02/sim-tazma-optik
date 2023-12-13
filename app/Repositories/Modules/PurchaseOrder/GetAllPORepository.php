<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;

use App\DTO\Modules\PurchaseOrderDTOs\POFilterDTO;
use App\DTO\Modules\PurchaseOrderDTOs\POInfoDTO;

use App\Models\Modules\PurchaseOrder;

class GetAllPORepository {
    /**
     * Get all Purchase Order
     * @param POFilterDTO $poFilter
     * @return POInfoDTO
     */
    public function getAllPurchaseOrder(POFilterDTO $poFilter) {
        try {
            // Check if filter is active
            $activeFilter = [];

            $bulan_sql = $poFilter->getBulan() ? "tanggal_dibuat LIKE '%-{$poFilter->getBulan()}-%'" : null;
            array_push($activeFilter, $bulan_sql);

            $tahun_sql = $poFilter->getTahun() ? "tanggal_dibuat LIKE '{$poFilter->getTahun()}-%'" : null;
            array_push($activeFilter, $tahun_sql);

            $status_po_sql = $poFilter->getStatusPo() !== null ? "status_po = " . (int)$poFilter->getStatusPo() : null;
            array_push($activeFilter, $status_po_sql);

            $status_penerimaan_sql = $poFilter->getStatusPenerimaan() !== null ? "status_penerimaan = " . (int)$poFilter->getStatusPenerimaan() : null;
            array_push($activeFilter, $status_penerimaan_sql);

            $status_pembayaran_sql = $poFilter->getStatusPembayaran() !== null ? "status_pembayaran = " . (int)$poFilter->getStatusPembayaran() : null;
            array_push($activeFilter, $status_pembayaran_sql);

            $vendor_id_sql = $poFilter->getVendorId() ? "vendor_id = '{$poFilter->getVendorId()}'" : null;
            array_push($activeFilter, $vendor_id_sql);

            $made_by_sql = $poFilter->getMadeBy() ? "made_by = '{$poFilter->getMadeBy()}'" : null;
            array_push($activeFilter, $made_by_sql);

            $checked_by_sql = $poFilter->getCheckedBy() ? "checked_by = '{$poFilter->getCheckedBy()}'" : null;
            array_push($activeFilter, $checked_by_sql);

            $approved_by_sql = $poFilter->getApprovedBy() ? "approved_by = '{$poFilter->getApprovedBy()}'" : null;
            array_push($activeFilter, $approved_by_sql);

            $activeFilter = array_filter($activeFilter, function ($filter) {
                return $filter != null;
            });

            $activeFilter = implode(' AND ', $activeFilter);

            // Get PO Filtered
            $poFiltered = PurchaseOrder::whereRaw($activeFilter ? $activeFilter : 1)
                ->join('vendors', 'purchase_orders.vendor_id', '=', 'vendors.id')
                ->join('users as made_by', 'purchase_orders.made_by', '=', 'made_by.id')
                ->join('users as checked_by', 'purchase_orders.checked_by', '=', 'checked_by.id')
                ->join('users as approved_by', 'purchase_orders.approved_by', '=', 'approved_by.id')
                ->select(
                    'purchase_orders.*',
                    'vendors.nama_vendor',
                    'made_by.employee_name as made_by_name',
                    'checked_by.employee_name as checked_by_name',
                    'approved_by.employee_name as approved_by_name'
                )
                ->paginate($poFilter->getLimit(), ['*'], 'page', $poFilter->getPage());

            $poDTOs = [];

            foreach ($poFiltered as $po) {
                $poDTO = new POInfoDTO(
                    $po->id,
                    $po->nomor_po,
                    $po->tanggal_dibuat,
                    $po->status_po,
                    $po->status_penerimaan,
                    $po->status_pembayaran,
                    $po->vendor_id,
                    $po->nama_vendor,
                    $po->made_by,
                    $po->made_by_name,
                    $po->checked_by,
                    $po->checked_by_name,
                    $po->approved_by,
                    $po->approved_by_name
                );
                array_push($poDTOs, $poDTO);
            }

            return $poDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
