<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;

use App\Repositories\Modules\PurchaseOrder\GetLatestPORepository;

class GeneratePoNumberService {
    public function __construct(
        private GetLatestPORepository $getLatestPORepository
    ) {}

    /**
     * Generate PO Number
     * @return string
     */
    public function generatePoNumber() {
        try {
            $latestPO = $this->getLatestPORepository->getLatestPO();

            $latestPOMonth = 0;
            $latestPOSerial = 0;
            if ($latestPO != null) {
                $latestPONumber = $latestPO->getNomorPo();

                // get latest PO month and serial
                $POInfo = explode('/', $latestPONumber);
                $latestPOMonth = (int)explode('-', $POInfo[2])[1];
                $latestPOSerial = (int)$POInfo[3];
            }

            // get current year and month
            $currentDate = date('Ymd');
            $currentYear = substr($currentDate, 0, 4);
            $currentMonth = (int)substr($currentDate, 4, 2);

            // generate PO number
            $POYear = $currentYear;
            $POMonth = $currentMonth;
            $POSerial = 1;

            // reset PO serial if current month is different with latest PO month
            if ($POMonth != $latestPOMonth) {
                $POMonth = $currentMonth;
                $POSerial = 1;
            } else {
                $POMonth = $latestPOMonth;
                $POSerial = $latestPOSerial + 1;
            }

            // generate PO Number
            $PONumber = $POYear."/SC/PO-".$POMonth."/".$POSerial;

            return $PONumber;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
