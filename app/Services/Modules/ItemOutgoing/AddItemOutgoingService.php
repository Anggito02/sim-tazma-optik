<?php

namespace App\Services\Modules\ItemOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ItemOutgoingDTOs\NewItemOutgoingDTO;

use App\Repositories\Modules\ItemOutgoing\AddItemOutgoingRepository;
use App\Services\Modules\ItemOutgoing\GenerateOutgoingNumberService;

class AddItemOutgoingService {
    public function __construct(
        private AddItemOutgoingRepository $itemOutgoingRepository,
        private GenerateOutgoingNumberService $generateOutgoingNumberService
    )
    {}

    /**
     * Add new item outgoing
     * @param Request $request
     * @return ItemOutgoingInfoDTO
     */
    public function addItemOutgoing(Request $request) {
        try {
            // Validate request
            $request->validate([
                'tanggal_pengiriman' => 'required|date|after_or_equal:today',
                'branch_id' => 'required|exists:branches,id',
                'packed_by' => 'required|exists:users,id',
                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id'
            ]);

            $nomor_outgoing = $this->generateOutgoingNumberService->generateOutgoingNumber();

            $tanggal_outgoing = date('Y-m-d H:i:s');

            $newItemOutgoingDTO = new NewItemOutgoingDTO(
                $nomor_outgoing,
                $tanggal_outgoing,
                $request->tanggal_pengiriman,
                $request->branch_id,
                $request->packed_by,
                $request->checked_by,
                $request->approved_by
            );

            $itemOutgoingDTO = $this->itemOutgoingRepository->addItemOutgoing($newItemOutgoingDTO);

            return $itemOutgoingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
