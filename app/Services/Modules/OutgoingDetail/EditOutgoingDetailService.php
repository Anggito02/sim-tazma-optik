<?php

namespace App\Services\Modules\OutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\OutgoingDetailDTOs\EditOutgoingDetailDTO;

use App\Repositories\Modules\OutgoingDetail\EditOutgoingDetailRepository;

class EditOutgoingDetailService {
    public function __construct(
        private EditOutgoingDetailRepository $outgoingDetailRepository
    ) {}

    /**
     * Edit outgoing detail
     * @param Request $request
     * @return EditOutgoingDetailDTO
     */
    public function editOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:outgoing_details,id',
                'delivered_qty' => 'required|numeric|min:1',
                'item_id' => 'required|exists:items,id',
                'verified_by' => 'required|exists:users,id',
            ]);

            $editOutgoingDetailDTO = new EditOutgoingDetailDTO(
                $request->id,
                $request->delivered_qty,
                $request->item_id,
                $request->verified_by,
            );

            $outgoingDetailDTO = $this->outgoingDetailRepository->editOutgoingDetail($editOutgoingDetailDTO);

            return $outgoingDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
