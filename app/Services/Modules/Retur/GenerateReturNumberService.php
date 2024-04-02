<?php

namespace App\Services\Modules\Retur;

use Exception;

use App\Repositories\Modules\Retur\GetLatestReturNumberRepository;

class GenerateReturNumberService {
    public function __construct(
        private GetLatestReturNumberRepository $getLatestReturNumberRepository
    ) {}

    /**
     * Generate retur number
     * @return string
     */
    public function generateReturNumber() {
        try {
            // Get latest retur number info
            $latestReturNumber = $this->getLatestReturNumberRepository->getLatestReturNumber();

            $latestReturMonth = "";
            if ($latestReturNumber != null) {
                $latestReturNumber = explode('/', $latestReturNumber);
                $latestReturMonth = explode('-', $latestReturNumber[2])[1];
                $latestReturSerial = $latestReturNumber[3];
            }

            // get current year and month
            $currentDate = date('Ymd');
            $currentYear = substr($currentDate, 0, 4);
            $currentMonth = (int)substr($currentDate, 4, 2);

            $returYear = $currentYear;
            $returMonth = $currentMonth;
            $returSerial = 1;

            // reset retur serial if current month is different with latest retur month
            if ($returMonth != $latestReturMonth) {
                $returMonth = $currentMonth;
                $returSerial = 1;
            } else {
                $returMonth = $latestReturMonth;
                $returSerial = $latestReturSerial + 1;
            }

            // generate retur Number
            $returNumber = $returYear."/SC/RET-".$returMonth."/".$returSerial;

            return $returNumber;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
