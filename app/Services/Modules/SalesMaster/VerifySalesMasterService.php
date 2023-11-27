<?php

namespace App\Services\Modules\SalesMaster;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesMaster\VerifySalesMasterRepository;

class VerifySalesMasterService {
    public function __construct(
        private VerifySalesMasterRepository $verifySalesMasterRepository,
    )
    {}

    /**
     * Verify Sales Master
     * @param Request $request
     * @return SalesMaster
     */
    public function verifySalesMaster(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:sales_masters,id',
            ]);

            $salesMaster = $this->verifySalesMasterRepository->verifySalesMaster($request->id);

            return $salesMaster;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
