<?php

namespace App\Services\Modules\ReturDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReturDetailDTOs\EditReturDetailDTO;

use App\Repositories\Modules\ReturDetail\EditReturDetailRepository;

class EditReturDetailService {
    public function __construct(
        private EditReturDetailRepository $returDetailRepository
    ) {}

    /**
     * Edit retur detail
     * @param Request $request
     * @return EditReturDetailDTO
     */
    public function editReturDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:retur_details,id',
                'delivered_qty' => 'required|numeric|min:1',
                'item_id' => 'required|exists:items,id',
                'verified_by' => 'required|exists:users,id',
            ]);

            $editReturDetailDTO = new EditReturDetailDTO(
                $request->id,
                $request->delivered_qty,
                $request->item_id,
                $request->verified_by,
            );

            $returDetailDTO = $this->returDetailRepository->editReturDetail($editReturDetailDTO);

            return $returDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
