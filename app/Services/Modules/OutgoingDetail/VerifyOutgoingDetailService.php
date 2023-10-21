<?php

namespace App\Services\Modules\OutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\OutgoingDetail\VerifyOutgoingDetailRepository;

class VerifyOutgoingDetailService {
    public function __construct(
        private VerifyOutgoingDetailRepository $outgoingDetailRepository
    )
    {}

    /**
     * Verify outgoing detail
     * @param Request $request
     * @return OutgoingDetailInfoDTO
     */
    public function verifyOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:outgoing_details,id',
            ]);

            $outgoingDetailDTO = $this->outgoingDetailRepository->verifyOutgoingDetail($request->id);

            return $outgoingDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
