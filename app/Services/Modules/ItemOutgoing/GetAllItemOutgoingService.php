<?php

namespace App\Services\Modules\ItemOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ItemOutgoingDTOs\ItemOutgoingInfoDTO;

use App\Repositories\Modules\ItemOutgoing\GetAllItemOutgoingRepository;

class GetAllItemOutgoingService {
    public function __construct(
        private GetAllItemOutgoingRepository $itemOutgoingRepository
    ) {}

    /**
     * Get all item outgoing
     * @param Request $request
     * @return ItemOutgoingInfoDTO
     */
    public function getAllItemOutgoing(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $itemOutgoingDTO = $this->itemOutgoingRepository->getAllItemOutgoing($request->page, $request->limit);

            return $itemOutgoingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>
