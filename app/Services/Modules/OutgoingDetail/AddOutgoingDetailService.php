<?php

namespace App\Services\Modules\OutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\OutgoingDetailDTOs\NewOutgoingDetailDTO;

use App\Repositories\Modules\OutgoingDetail\AddOutgoingDetailRepository;

class AddOutgoingDetailService {
    public function __construct(
        private AddOutgoingDetailRepository $outgoingDetailRepository
    )
    {}

    /**
     * Add new outgoing detail
     * @param Request $request
     * @return OutgoingDetailInfoDTO
     */
    public function addOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'delivered_qty' => 'required|numeric|min:1',

                'outgoing_id' => 'required|exists:item_outgoings,id',
                'item_id' => 'required|exists:items,id',
                'verified_by' => 'required|exists:users,id',
            ]);

            $newOutgoingDetailDTO = new NewOutgoingDetailDTO(
                $request->delivered_qty,

                $request->outgoing_id,
                $request->item_id,
                $request->verified_by,
            );

            $outgoingDetailDTO = $this->outgoingDetailRepository->addOutgoingDetail($newOutgoingDetailDTO);

            return $outgoingDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
