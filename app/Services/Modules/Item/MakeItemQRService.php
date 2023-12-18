<?php

namespace App\Services\Modules\Item;

use Exception;

use App\DTO\ItemDTOs\ItemQRInfoDTO;
use Illuminate\Support\Facades\Storage;

// [OUTER DEPENDENCIES] QR Code Generator
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MakeItemQRService {
    /**
     * Make item QR
     * @param ItemQRInfoDTO $itemQRInfoDTO
     * @return string $qr_path
     */
    public function makeItemQR(ItemQRInfoDTO $itemQRInfoDTO) {
        try {

            // Make QR
            $qr = QrCode::format('png')
                ->size(500)
                ->generate(json_encode($itemQRInfoDTO->getQRData()));

            $qr_path = 'qr/item/'. $itemQRInfoDTO->getId() . '_' . str_replace(' ', '_', $itemQRInfoDTO->getKodeItem()) . '.png';

            Storage::put($qr_path, $qr);

            return $qr_path;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
