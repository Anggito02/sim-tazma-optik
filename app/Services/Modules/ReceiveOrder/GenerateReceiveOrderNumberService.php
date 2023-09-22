<?php

namespace App\Services\Modules\ReceiveOrder;

use Exception;

use App\Repositories\Modules\ReceiveOrder\GetLatestReceiveOrderRepository;

class GenerateReceiveOrderNumberService {
    public function __construct(
        private GetLatestReceiveOrderRepository $getLatestRORepository
    ) {}

    /**
     * Generate RO Number
     * @return string
     */
    public function generateReceiveOrderNumber() {
        try {
            $latestRO = $this->getLatestRORepository->getLatestRO();

            $latestROMonth = 0;
            $latestROSerial = 0;
            if ($latestRO != null) {
                $latestRONumber = $latestRO->getNomorReceiveOrder();

                // get latest RO month and serial
                $ROInfo = explode('/', $latestRONumber);
                $latestROMonth = (int)explode('-', $ROInfo[2])[1];
                $latestROSerial = (int)$ROInfo[3];
            }

            // get current year and month
            $currentDate = date('Ymd');
            $currentYear = substr($currentDate, 0, 4);
            $currentMonth = (int)substr($currentDate, 4, 2);

            // generate RO number
            $ROYear = $currentYear;
            $ROMonth = $currentMonth;
            $ROSerial = 1;

            // reset RO serial if current month is different with latest RO month
            if ($ROMonth != $latestROMonth) {
                $ROMonth = $currentMonth;
                $ROSerial = 1;
            } else {
                $ROMonth = $latestROMonth;
                $ROSerial = $latestROSerial + 1;
            }

            // generate RO Number
            $RONumber = $ROYear."/SC/RO-".$ROMonth."/".$ROSerial;

            return $RONumber;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
