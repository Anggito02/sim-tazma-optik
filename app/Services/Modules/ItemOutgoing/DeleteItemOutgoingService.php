<?php

namespace App\Services\Modules\ItemOutgoing;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\ItemOutgoing\DeleteItemOutgoingRepository;

class DeleteItemOutgoingService {
    public function __construct(
        private DeleteItemOutgoingRepository $itemOutgoingRepository
    ) {}

    /**
     * Delete item outgoing
     * @param Request $request
     * @return bool
     */
    public function deleteItemOutgoing(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:item_outgoings,id',
            ]);

            $itemOutgoing = $this->itemOutgoingRepository->deleteItemOutgoing($request->id);

            return $itemOutgoing;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
