<?php

namespace App\Services\Modules\OutgoingDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\OutgoingDetail\DeleteOutgoingDetailRepository;

class DeleteOutgoingDetailService {
    public function __construct(
        private DeleteOutgoingDetailRepository $deleteOutgoingDetailRepository,
    )
    {}

    /**
     * Delete outgoing detail
     * @param Request $request
     * @return bool
     */
    public function deleteOutgoingDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:outgoing_details,id',
            ]);

            $outgoingDetail = $this->deleteOutgoingDetailRepository->deleteOutgoingDetail($request->id);

            return $outgoingDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
