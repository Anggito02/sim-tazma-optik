<?php

namespace App\Services\Modules\OutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\OutgoingDetailDTOs\OutgoingDetailInfoDTO;

use App\Repositories\Modules\OutgoingDetail\GetAllOutgoingDetailRepository;

class GetAllOutgoingDetailService {
    public function __construct(
        private GetAllOutgoingDetailRepository $outgoingDetailRepository
    )
    {}

    /**
     * Get all outgoing detail
     * @param Request $request
     * @return OutgoingDetailInfoDTO[]
     */
    public function getAllOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'outgoing_id' => 'required|exists:item_outgoings,id',
            ]);

            $outgoingDetailDTOs = $this->outgoingDetailRepository->getAllOutgoingDetail($request->outgoing_id);

            return $outgoingDetailDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
