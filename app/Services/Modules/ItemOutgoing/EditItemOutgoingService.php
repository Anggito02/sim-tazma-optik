<?php

namespace App\Services\Modules\ItemOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ItemOutgoingDTOs\EditItemOutgoingDTO;

use App\Repositories\Modules\ItemOutgoing\EditItemOutgoingRepository;

class EditItemOutgoingService {
    public function __construct(
        private EditItemOutgoingRepository $itemOutgoingRepository
    ) {}

    /**
     * Edit item outgoing
     * @param Request $request
     * @return EditItemOutgoingDTO
     */
    public function editItemOutgoing(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:item_outgoings,id',
                'tanggal_pengiriman' => 'required|date|after_or_equal:today',

                'branch_id' => 'required|exists:branches,id',

                'known_by' => 'required|exists:users,id',
                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
                'delivered_by' => 'required|exists:users,id',
                'received_by' => 'nullable|exists:users,id',
            ]);

            $editItemOutgoingDTO = new EditItemOutgoingDTO(
                $request->id,
                $request->tanggal_pengiriman,

                $request->branch_id,

                $request->known_by,
                $request->checked_by,
                $request->approved_by,
                $request->delivered_by,
                $request->received_by,
            );

            $itemOutgoingDTO = $this->itemOutgoingRepository->editItemOutgoing($editItemOutgoingDTO);

            return $itemOutgoingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
