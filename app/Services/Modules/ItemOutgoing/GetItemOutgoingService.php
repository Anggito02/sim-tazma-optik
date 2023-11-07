<?php

namespace App\Services\Modules\ItemOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ItemOutgoingDTOs\ItemOutgoingInfoDTO;

use App\Repositories\Modules\ItemOutgoing\GetItemOutgoingRepository;

class GetItemOutgoingService {
    public function __construct(
        private GetItemOutgoingRepository $itemOutgoingRepository
    ) {}

    /**
     * Get item outgoing
     * @param Request $request
     * @return ItemOutgoingInfoDTO
     */
    public function getItemOutgoing(Request $request) {
        // Validate request
        $request->validate([
            'id' => 'required|exists:item_outgoings,id'
        ]);

        $id = $request->id;

        try {
            $itemOutgoingDTO = $this->itemOutgoingRepository->getItemOutgoing($id);

            return $itemOutgoingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
