<?php

namespace App\Services\Modules\ReturDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReturDetailDTOs\ReturDetailInfoDTO;

use App\Repositories\Modules\ReturDetail\GetAllReturDetailRepository;

class GetAllReturDetailService {
    public function __construct(
        private GetAllReturDetailRepository $returDetailRepository
    )
    {}

    /**
     * Get all retur detail
     * @param Request $request
     * @return ReturDetailInfoDTO[]
     */
    public function getAllReturDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'retur_id' => 'required|exists:returs,id',
            ]);

            $returDetailDTOs = $this->returDetailRepository->getAllReturDetail($request->retur_id);

            return $returDetailDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
