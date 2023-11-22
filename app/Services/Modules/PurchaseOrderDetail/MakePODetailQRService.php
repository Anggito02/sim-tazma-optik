<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;

use App\DTO\Modules\PurchaseOrderDetail\PurchaseOrderDetailQRInfoDTO;
use Illuminate\Support\Facades\Storage;

// [OUTER DEPENDENCIES] QR Code Generator
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MakePODetailQRService {
    /**
     * Make item QR
     * @param PurchaseOrderDetailQRInfoDTO $poDetailQRInfoDTO
     * @return string $qr_path
     */
    public function makePODetailQR(PurchaseOrderDetailQRInfoDTO $poDetailQRInfoDTO) {
        try {

            // Make QR
            $qr = QrCode::format('png')
                ->size(500)
                ->generate(json_encode($poDetailQRInfoDTO->getQRData()));

            $qr_path = 'qr/po_detail/'. 'PO-' . $poDetailQRInfoDTO->getPoId() . '_' . 'Item-' . $poDetailQRInfoDTO->getItemId() . '.png';

            Storage::put($qr_path, $qr);

            return $qr_path;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
