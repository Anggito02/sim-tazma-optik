<?php

namespace App\Services\Modules\ReturDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReturDetailDTOs\NewReturDetailDTO;

use App\Repositories\Modules\ReturDetail\AddReturDetailRepository;

class AddReturDetailService {
    public function __construct(
        private AddReturDetailRepository $returDetailRepository
    )
    {}

    /**
     * Add new retur detail
     * @param Request $request
     * @return ReturDetailInfoDTO
     */
    public function addReturDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'delivered_qty' => 'required|numeric|min:1',

                'retur_id' => 'required|exists:returs,id',
                'item_id' => 'required|exists:items,id',
                'verified_by' => 'required|exists:users,id',
            ]);

            $newReturDetailDTO = new NewReturDetailDTO(
                $request->delivered_qty,

                $request->retur_id,
                $request->item_id,
                $request->verified_by,
            );

            $returDetailDTO = $this->returDetailRepository->addReturDetail($newReturDetailDTO);

            return $returDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
