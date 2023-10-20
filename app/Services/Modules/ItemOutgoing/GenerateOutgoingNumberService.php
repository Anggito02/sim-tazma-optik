<?php

namespace App\Services\Modules\ItemOutgoing;

use Exception;

use App\Repositories\Modules\ItemOutgoing\GetLatestOutgoingNumberRepository;

class GenerateOutgoingNumberService {
    public function __construct(
        private GetLatestOutgoingNumberRepository $getLatestOutgoingNumberRepository
    ) {}

    /**
     * Generate po number
     * @return string
     */
    public function generateOutgoingNumber() {
        try {
            // Get latest outgoing number info
            $latestOutgoingNumber = $this->getLatestOutgoingNumberRepository->getLatestOutgoingNumber();

            $latestOutgoingMonth = "";
            if ($latestOutgoingNumber != null) {
                $latestOutgoingNumber = explode('/', $latestOutgoingNumber);
                $latestOutgoingMonth = explode('-', $latestOutgoingNumber[2])[1];
                $latestOutgoingSerial = $latestOutgoingNumber[3];
            }

            // get current year and month
            $currentDate = date('Ymd');
            $currentYear = substr($currentDate, 0, 4);
            $currentMonth = (int)substr($currentDate, 4, 2);

            $outgoingYear = $currentYear;
            $outgoingMonth = $currentMonth;
            $outgoingSerial = 1;

            // reset outgoing serial if current month is different with latest outgoing month
            if ($outgoingMonth != $latestOutgoingMonth) {
                $outgoingMonth = $currentMonth;
                $outgoingSerial = 1;
            } else {
                $outgoingMonth = $latestOutgoingMonth;
                $outgoingSerial = $latestOutgoingSerial + 1;
            }

            // generate outgoing Number
            $outgoingNumber = $outgoingYear."/SC/OUT-".$outgoingMonth."/".$outgoingSerial;

            return $outgoingNumber;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
